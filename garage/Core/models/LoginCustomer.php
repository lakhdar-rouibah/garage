<?php
// name of project Miramis.
// Author :  lakhdar.
// Create in  2018-09-02 at 21:22:48.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// Login to check if user is login or not

namespace models ;
use models as models;
use app\kernel\service as service;


if ($_SESSION['loginCustomer'] != null){

    exit(header('location: ?req=DeskTop'));
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // instantiate table Admin and store in variable $admin
    $admin =  new service\Seed('CUSTOMER');
    // hash post password 
    $password = sha1($_POST['password']);
    $mail = $_POST['mail'];

    $array = array("mail"=>$mail, "password"=>$password);
    // search in table Admin mail and password and sotre in variable $res_admin
    $res_admin = $admin->search_in_table("*", $array);
    
    if(!$res_admin) {

        // session login equal false 
        $_SESSION['registration'] = 'Password or mail is not correct!';
        $_SESSION['icon'] = "danger";

    }else if(intval($res_admin[0]['check_mail']) === 0){

        $_SESSION['registration'] = 'You must activate your account!';
        $_SESSION['icon'] = "danger";

    }else if(intval($res_admin[0]['check_mail']) === 1){

        $id = $res_admin[0]['id_customer'];
        $name = $res_admin[0]['first_name']." ".$res_admin[0]['name'];
        $_SESSION['loginCustomer'] = array($id, $name);
        // location to DeskTop
        exit(header('location: ?rec=DeskTopCustomer'));

    
    }
}