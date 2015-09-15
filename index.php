<?php

//INCLUDE THE FILES NEEDED...
//VIEW...
    require_once('view/LoginView.php');
    require_once('view/DateTimeView.php');
    require_once('view/LayoutView.php');
//CONTROLLER...
    require_once('controller/LoginController.php');
//MODEL...
    require_once('model/LoginModel.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//CREATE OBJECTS OF THE MODEL
$loginModel = new LoginModel();

//CREATE OBJECTS OF THE VIEWS
$v = new LoginView($loginModel);
$dtv = new DateTimeView();
$lv = new LayoutView();

//CREATE OBJECTS OF THE CONTROLLER
$loginController = new LoginController($v, $loginModel);


$loginController->Start();

$lv->render($loginModel->isUserLoggedIn(), $v, $dtv);

