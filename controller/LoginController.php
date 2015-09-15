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
            
            $this->model->Check($this->username, $this->password);
        }
        
        else if($this->view->logout()){
            $this->model->logout();
        }
        
    }

}