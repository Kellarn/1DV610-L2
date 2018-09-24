<?php

//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('model/login.php');


//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$login = new \model\Login();
//CREATE OBJECTS OF THE VIEWS
$v = new LoginView($login);
$dtv = new DateTimeView();
$lv = new LayoutView();


if(session_status() == 1){
    $lv->render(false, $v, $dtv);
    echo session_status();
} else {
    echo session_status();
    echo "Hello";
    if($_SESSION["isLoggedIn"] == true){
        $lv->render(true, $v, $dtv);
    }
}



