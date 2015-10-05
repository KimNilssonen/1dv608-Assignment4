<?php

class RegisterController {
    
    private $registerView;
    private $registerModel;
    private $layoutView;
    
    public function __construct(RegisterView $registerView, RegisterModel $registerModel, LayoutView $layoutView, DateTimeView $dateTimeView) {
        $this->registerView = $registerView;
        $this->registerModel = $registerModel;
        $this->layoutView = $layoutView;
        $this->dateTimeView = $dateTimeView;
    }
    
    public function start() {
        $this->register();
        $this->layoutView->render(false, true, $this->registerView, $this->dateTimeView);
        
    }
    
    public function register() {
        
         //Check if something is posted then pass on the information.
        if($this->registerView->isPosted()){
            $this->username = $this->registerView->getUsername();
            $this->password = $this->registerView->getPassword();
            $this->passwordRepeat = $this->registerView->getPasswordRepeat();
            
            
            try {
                $this->registerModel->check($this->username, $this->password, $this->passwordRepeat);
                $this->registerView->setMessage('Det funkar typ.');
            }
            catch (Exception $e) {
                $this->registerView->setMessage($e->getMessage());
            }
            
            
        //     try {
        //         $this->model->check($this->username, $this->password);
                
        //         // Updates the message in loginView and logs in the user in model.
    	   //     if($this->updateSession->isUpdated()){
    	   //         $this->view->setMessage('Welcome');
    	   //     }
    	   //     else{
    	   //         $this->view->setMessage('');
    	   //     }
        //     }
        //     catch (Exception $e){
        //         $this->view->setMessage($e->getMessage());
        //     }
        // }
        
        // // Updates the message in loginView and logs out the user in model.
        // else if($this->view->logout()) {
        //     try{
        //         $this->model->logout();
        //         if(!$this->updateSession->isUpdated()){
    	   //         $this->view->setMessage('Bye bye!');
    	            
    	   //     }
    	   //     else{
    	   //         $this->view->setMessage('');
    	   //     }         
        //     }
        //     catch (Exception $e){
        //         $this->view->setMessage($e->getMessage());
        //     }
            
        }
        
    }
    
}