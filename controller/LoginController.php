<?php

class LoginController{
    
    private $view;
    private $model;
    
    private $username;
    private $password;
    
    public function __construct(LoginView $view, LoginModel $model){
        
        $this->view = $view;
        $this->model= $model;
    }
    
    public function Start(){
        //Check if something is posted then pass on the information.
        
        if($this->view->isPosted()){
            $this->username = $this->view->getUsername();
            $this->password = $this->view->getPassword();
            return $this->model->Check($this->username, $this->password);
        }
        return null;
        
    }
    
    public function getNameInput(){
        return $this->username;
    }
    
    public function getPasswordInput(){
        return $this->password;
    }
}