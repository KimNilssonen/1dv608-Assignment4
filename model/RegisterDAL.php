<?php

class RegisterDAL {
    
    private $user;
    
    public function __construct() {
        $this->userArray = array();
        $this->dataFile = 'data/data.bin';
    }
    
    public function addUser(User $user) {
        
        // Recieve the user.
        $this->user = $user;
        
        // Fetch the array from data file.
        $this->userArray = $this->getUsers();
        
        // If array is empty, create a new.
        if(empty($this->userArray)) {
            $this->userArray = array();
        }
        
        // Put user object in the array.    
        array_push($this->userArray, $this->user);
        
        // Readying the file to be saved in the data file.
        $serializedArray = serialize($this->userArray);
        
        // Save the serialized array to the datafile.
        file_put_contents($this->dataFile, $serializedArray);
        
        $_SESSION['registeredUser'] = $this->user->getName();
    }
    
    
    public function getUsers() {
        
        // Gets the content in the data file and unserialize the file so we can read it.
        return unserialize(file_get_contents($this->dataFile));
    }
}