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
            //  if(isset($_SESSION['UserLoggedIn']) && $_SESSION['UserLoggedIn']){
                 
                 //$this->clearMessage();
                 //TODO: Fix a way to clear the message if there is an active session (if the user is logged in).
            //  }
            //  else {
                $_SESSION['UserLoggedIn'] = true;
                // $message = 'Welcome';
                //TODO: Fix a way to set a welcome message if the user just logged in.
            //  }
            
            return true;//$this->isUserLoggedIn();
        }
        
        else if(empty($name)){
            throw new Exception('Username is missing');
            //$message = 'Username is missing';
        }
        else if(empty($password)){
            throw new Exception('Password is missing');
            //$message = 'Password is missing';
        }
        else{
            throw new Exception('Wrong name or password');
            //$message = 'Wrong name or password';
        }
    }
    
    // public function modelResponse(){
    //     return $this->message;
    // }
    
    public function logout(){
        if(isset($_SESSION['UserLoggedIn']) && $_SESSION['UserLoggedIn']){
                // $message = 'Bye bye!';
                //TODO: Fix a way to set a bye message if the user logged out.
                $_SESSION['UserLoggedIn'] = false;
        }
        else {
            // $message = '';
            //TODO: Fix a way to clear message if the user logged out and there is a active session.
        }

        //$this->message = $message;
        
        
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