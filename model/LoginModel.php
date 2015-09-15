<?php
session_start();
class LoginModel{
    
    private $message;
    
   public function __construct(){
        if (!isset($_SESSION['UserLoggedIn'])) {
            $_SESSION['UserLoggedIn'] = false;
        }
   }
   
   
    //Check name and password, return a message.
    public function Check($name, $password){
        
        $correctUsername = 'Admin';
        $correctPassword = 'Password';
        $message = '';
        
        trim($name);
        trim($password);
        
        if($name == $correctUsername && $password == $correctPassword){
            if(isset($_SESSION['UserLoggedIn']) && $_SESSION['UserLoggedIn']){
                $message = '';
            }
            else {
                $_SESSION['UserLoggedIn'] = true;
                $message = 'Welcome';
            }
            
            $this->isUserLoggedIn();
        }
        
        else if($name == ''){
            $message = 'Username is missing';
        }
        else if($password == ''){
            $message = 'Password is missing';
        }
        else{
            $message = 'Wrong name or password';
        }
        
        $this->message = $message;
    }
    
    public function modelResponse(){
        return $this->message;
    }
    
    public function logout(){
        if(isset($_SESSION['UserLoggedIn']) && $_SESSION['UserLoggedIn']){
                $message = 'Bye bye!';
                $_SESSION['UserLoggedIn'] = false;
        }
        else {
            $message = '';
        }

        $this->message = $message;
        
        
        session_destroy();
    }
    
    public function isUserLoggedIn(){
        if(isset($_SESSION['UserLoggedIn'])){
            if($_SESSION['UserLoggedIn']){
                return true;
            }
        }
        return false;
    }
    
    public function clearMessage(){
        $message = '';
        $this->message = $message;
    }
}    