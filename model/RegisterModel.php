<?php

class RegisterModel {
    
    public function check($name, $password, $passwordRepeat) {
        
        if(strlen($name) < 3) {
            
            if(strlen($password) < 6) {
                throw new Exception('Username has too few characters, at least 3 characters. Password has too few characters, at least 6 characters.');
            }
            
            throw new Exception('Username has too few characters, at least 3 characters.');   
        }
        
        if(strlen($password) < 6) {
                throw new Exception('Password has too few characters, at least 6 characters.');
        }
        
        if($password != $passwordRepeat) {
            throw new Exception('Passwords do not match.');
        }
    }
}