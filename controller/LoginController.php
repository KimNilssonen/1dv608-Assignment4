<?php

class LoginController{
    
    private $view;
    private $model;
    private $updateSession;
    private $layoutView;
    private $dateTimeView;
    
    public function __construct(LoginView $view, LoginModel $model, UpdateSession $updateSession, LayoutView $layoutView, DateTimeView $dateTimeView){
        
        $this->view = $view;
        $this->model = $model;
        $this->updateSession = $updateSession;
        $this->layoutView = $layoutView;
        $this->dateTimeView = $dateTimeView;
        
    }
    
    public function start(){
        
        $this->userPost();
        $this->layoutView->render($this->model->isUserLoggedIn(), false, $this->view, $this->dateTimeView);
        
    }
    
    public function userPost() {
        
        //Check if something is posted then pass on the information.
        if($this->view->isPosted()){
            $this->username = $this->view->getUsername();
            $this->password = $this->view->getPassword();
            
            try {
                $this->model->check($this->username, $this->password);
                
                // Updates the message in loginView and logs in the user in model.
    	        if($this->updateSession->isUpdated()){
    	            $this->view->setMessage('Welcome');
    	        }
    	        else{
    	            $this->view->setMessage('');
    	        }
            }
            catch (Exception $e){
                $this->view->setMessage($e->getMessage());
            }
        }
        
        // Updates the message in loginView and logs out the user in model.
        else if($this->view->logout()) {
            try{
                $this->model->logout();
                if(!$this->updateSession->isUpdated()){
    	            $this->view->setMessage('Bye bye!');
    	            
    	        }
    	        else{
    	            $this->view->setMessage('');
    	        }         
            }
            catch (Exception $e){
                $this->view->setMessage($e->getMessage());
            }
        }
    }
}