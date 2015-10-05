<?php

//INCLUDE THE FILES NEEDED...
//VIEW...
    require_once('view/LoginView.php');
    require_once('view/RegisterView.php');
    require_once('view/DateTimeView.php');
    require_once('view/LayoutView.php');
    
//CONTROLLER...
    require_once('controller/LoginController.php');
    require_once('controller/RegisterController.php');
    require_once('controller/updateSession.php');

//MODEL...
    require_once('model/LoginModel.php');
    require_once('model/RegisterModel.php');

class MasterController {

    public function start() {
        
        //CREATE OBJECTS OF THE MODEL
        $loginModel = new LoginModel();
        $registerModel = new RegisterModel();
        
        //CREATE OBJECTS OF THE VIEWS
        $view = new LoginView($loginModel);
        $registerView = new RegisterView();
        $dateTimeView = new DateTimeView();
        $layoutView = new LayoutView();
        
        //CREATE OBJECTS OF THE CONTROLLER
        $updateSession = new UpdateSession();
        $registerController = new RegisterController($registerView, $registerModel, $layoutView, $dateTimeView);
        $loginController = new LoginController($view, $loginModel, $updateSession, $layoutView, $dateTimeView);


    	$uri = $_SERVER['REQUEST_URI'];
    	$uri = explode('?', $uri);
	    
	    if(count($uri) > 1 && $uri[1] == 'register') {
	        $registerController->start();
	    }
	    else {
	        $loginController->start();
	    }
	    
    }
    
}