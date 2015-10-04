<?php

class RegisterController {
    
    private $registerView;
    private $registerModel;
    
    public function __construct(RegisterView $registerView, RegisterModel $registerModel) {
        $this->registerView = $registerView;
        $this->registerModel = $registerModel;
    }
    
    public function start() {
        
    }
    
}