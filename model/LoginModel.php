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
            
            $message = 'Welcome';
            
            $_SESSION['UserLoggedIn'] = true;
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
        
        $message = 'Bye bye!';
        $this->message = $message;
        
        $_SESSION['UserLoggedIn'] = false;
        session_destroy();
    }
    
    public function isUserLoggedIn(){
        
        if(isset($_SESSION['UserLoggedIn'])){
            
            if($_SESSION['UserLoggedIn']){
                return $_SESSION['UserLoggedIn'];
            }
        }
        return false;
    }
    
    public function clearMessage(){
        $message = '';
        $this->message = $message;
    }
}    