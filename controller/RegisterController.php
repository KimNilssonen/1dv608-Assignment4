<?php

class RegisterController {
    
    private $registerView;
    private $registerModel;
    private $registerDAL;
    private $layoutView;
    private $dateTimeView;
    
    public function __construct(RegisterView $registerView, RegisterModel $registerModel, RegisterDAL $registerDAL, LayoutView $layoutView, DateTimeView $dateTimeView) {
        $this->registerView = $registerView;
        $this->registerModel = $registerModel;
        $this->registerDAL = $registerDAL;
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
                
                // If this goes well, a new user will be returned.
                $user = $this->registerModel->check($this->username, $this->password, $this->passwordRepeat, $this->registerDAL);
                
                // Send the new user to addUser funcion in RegisterDAL to be added in array and file.
                $this->registerDAL->addUser($user);
                
                // If success, go back to index.
                $link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
                header("Location:$link");
            }
            
            // Catch errors and set messages depending on which error that happend.
            catch (Exception $e) {
                $this->registerView->setErrorMessage($e->getMessage());
            }
        }
        
    }
    
}