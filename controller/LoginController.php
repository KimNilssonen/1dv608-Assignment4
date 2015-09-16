<?php

class LoginController{
    
    private $view;
    private $model;
    
    public function __construct(LoginView $view, LoginModel $model){
        
        $this->view = $view;
        $this->model= $model;
    }
    
    public function Start(){
        //Check if something is posted then pass on the information.
        
        if($this->view->isPosted()){
            
            $this->username = $this->view->getUsername();
            $this->password = $this->view->getPassword();
            
            try {
                $this->model->Check($this->username, $this->password);
    	        $this->view->setMessage('Welcome');
            }
            catch (Exception $e){
                $this->view->setMessage($e->getMessage());
            }
        }
        
        else if($this->view->logout()){
            $this->view->setMessage('Bye bye!');
            $this->model->logout();
        }
        
    }
}