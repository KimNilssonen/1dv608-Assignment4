<?php

class RegisterModel {
    
    public function check($name, $password, $passwordRepeat, RegisterDAL $registerDAL) {

        $this->users = $registerDAL->getUsers();
        
        // Check if the array is empty and creates a new if it is.        
        if(empty($this->users)) {
            $this->users = array();
        }

        // Loops the array to chech if the username is already taken.
        foreach($this->users as $user) {
            if($user->getName() == $name) {
                throw new Exception('User exists, pick another username.');
            }
        }
        
        // Error handling concerning input.
        if(strlen($name) < 3) {
        
            if(strlen($password) < 6) {
                throw new Exception('Username has too few characters, at least 3 characters. Password has too few characters, at least 6 characters.');
            }
            throw new Exception('Username has too few characters, at least 3 characters.');   
        }
        
        if($name != strip_tags($name)) {
            strip_tags($name);
            throw new Exception('Username contains invalid characters.');
        }
        
        if(strlen($password) < 6) {
                throw new Exception('Password has too few characters, at least 6 characters.');
        }
        
        if($password != $passwordRepeat) {
            throw new Exception('Passwords do not match.');
        }
        
        
        // If no exception was thrown, return a new user.
        return new User($name, $password);
            
    }
}