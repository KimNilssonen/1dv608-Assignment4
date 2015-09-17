<?php
session_start();
class LoginModel{
    
    private $message;
//private $url;

    
   public function __construct(){
        if (!isset($_SESSION['UserLoggedIn'])) {
            $_SESSION['UserLoggedIn'] = false;
        }
        
        // May use this somehow to make the resubmit form dissappear.
//$_SERVER['HTTP_HOST'] is the actual adress while the $_SERVER['PHP_SELF'] is the current page, example index.php.
// 	$url = 'http://' .$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
// 	$this->url = $url;
        
   }
   
   
    //Check name and password, return a message.
    public function Check($name, $password){
        
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