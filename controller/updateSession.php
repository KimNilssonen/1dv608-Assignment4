<?php

class updateSession{
    
    public function __construct (){
         if(!isset($_SESSION['updated'])){
            $_SESSION['updated'] = false;
        }
    }
    
    public function isUpdated(){
        if(!$_SESSION['updated']){
            $_SESSION['updated'] = true;
            return true;
        }
        
        else{
            return false;
        }
        
    }
}