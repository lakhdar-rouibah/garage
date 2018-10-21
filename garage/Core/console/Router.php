<?php
use  Core\app\controlers;
$rec = $_GET["rec"];

switch ($rec){

    // case for login staff
    case "Login";
        $desktop = new controlers\Controler('Login');
    break;
    // case for login staff
    case "Password";
        $desktop = new controlers\Controler('Password');
    break;
    // case for login staff
    case "Forgot";
        $desktop = new controlers\Controler('Forgot');
    break;
    // case for login staff
    case "Change";
        $desktop = new controlers\Controler('Change');
    break;
    // case for login customer
    case "LoginCustomer";
        $desktop = new controlers\Controler('LoginCustomer');
    break;
    // case for login customer
    case "Success";
        $desktop = new controlers\Controler('Success');
    break;
    // case for login customer
    case "Validate";
        $desktop = new controlers\Controler('Validate');
    break;
    // case for register customer
    case "RegisterCustomer";
        $desktop = new controlers\Controler('RegisterCustomer');
    break;
    // case for desktop customer
    case "DeskTopCustomer";
        if($_SESSION['loginCustomer']){
            $desktop = new controlers\Controler('DeskTopCustomer');
        }else {

            exit(header('location: index.php'));
        }
    break;
    // case for Agenda
    case "Agenda";
        if($_SESSION['loginCustomer']){
            $desktop = new controlers\Controler('Agenda');
        }else {

            exit(header('location: index.php'));
        }
    break;
    // case for Agenda
    case "Cancel";
        if($_SESSION['loginCustomer']){
            $desktop = new controlers\Controler('Cancel');
        }else {

            exit(header('location: index.php'));
        }
    break;
    // case for Appoint
    case "Appoint";
        if($_SESSION['loginCustomer']){
            require_once './Core/models/Appoint.php';
        }else {

            exit(header('location: index.php'));
        }
    break;
    // case for log out
    case "LogOut";
        session_destroy();
        exit(header('location: index.php'));
    break;
    // case default
    default: 
    exit(header('location: index.php'));
    
}