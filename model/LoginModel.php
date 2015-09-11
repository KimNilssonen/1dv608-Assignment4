<?php

class LoginModel{
    
    private $message;
    
    public function Check($name, $password){
        
        //TODO: Check name and password, return a string with correct message.
        $correctUsername = 'Admin';
        $correctPassword = 'Password';
        $message = '';
        
        trim($name);
        trim($password);
        
        if($name == $correctUsername && $password == $correctPassword){
            $message = 'You have entered the correct login details';
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
}