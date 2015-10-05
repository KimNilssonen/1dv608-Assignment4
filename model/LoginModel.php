<?php
session_start();
class LoginModel{
    
    private $message;
//private $url;

    
   public function __construct(){
        if (!isset($_SESSION['UserLoggedIn'])) {
            $_SESSION['UserLoggedIn'] = false;
        }
   }
   
   
    //Check name and password, return a message.
    public function check($name, $password){
        
        $correctUsername = 'Admin';
        $correctPassword = 'Password';
        $message = '';
        
        // Trim away spaces since I use empty() on the name and password.
        trim($name);
        trim($password);
        
        // If the name and password are correct...
        if($name == $correctUsername && $password == $correctPassword){
            
            // ...sets the session to true. Then returns true to the controller.
            $_SESSION['UserLoggedIn'] = true;
            return $this->isUserLoggedIn();
        }
        
        else if(empty($name)){
            throw new Exception('Username is missing');
        }
        else if(empty($password)){
            throw new Exception('Password is missing');
        }
        else{
            throw new Exception('Wrong name or password');
        }
    }
    
    public function logout(){
        if(isset($_SESSION['UserLoggedIn']) && $_SESSION['UserLoggedIn']){
            $_SESSION['UserLoggedIn'] = false;
        }
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
}    