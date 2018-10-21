<?php
// name of project garage.
// Author :  lakhdar.
// Create in  2018-09-12 at 14:26:38.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

namespace models ;
use models as models;
use app\kernel\service as service;

// instantiate table CUSTOMER, HAVE
$admin =  new service\Seed('Admin');
$customer =  new service\Seed('CUSTOMER');
$password =  new service\Seed('password');

if (isset($_GET['code']) and isset($_GET['user'])){

    $user = $_GET['user'];

    $arr_id_password = service\Tools::search_with("*", "PASSWORD", "WHERE token='".$_GET['code']."' and state IS NULL");
    if($arr_id_password){

        $id_password = $arr_id_password[0]['id_password'];
        $date_token = $arr_id_password[0]['date'];
        $date = date('d-m-Y H:i:s');
        $day = strtotime("+1 day");
    
        if(($date - $date_token) < $day){

            // search in table Admin mail and password and sotre in variable $res_admin

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if($_POST['password'] === $_POST['password_conf']){

                    $password = service\Tools::check_password($_POST['password']);
                    switch($user){

                        case 'admin':
                            $arr_id= service\Tools::search_with("id", "ADMIN_CHANGE", "WHERE id_password = ".$id_password);
                            $id= $arr_id [0]['id'];
                            $data = array("password" => $password);
                            $condition = array("id" => $id);
                            $admin->update_table($data, $condition);
                        break;
                        case 'customer':
                            $arr_id= service\Tools::search_with("id_customer", "CUST_CHANGE", "WHERE id_password = ".$id_password);
                            $id= $arr_id[0]['id_customer'];
                            $data = array("password" => $password);
                            $condition = array("id_customee" => $id);
                            $customer->update_table($data, $condition);
                        break;
                    }

                    $data = array("state" => 1);
                    $condition = array("token" => $_GET['code']);
                    $password->update_table($data, $condition);

            
                    $_SESSION['registration'] = "Your password is changed now";
                    $_SESSION['icon'] = "success";

                }else{

                    $_SESSION['registration'] = "passwords diffirent";
                    $_SESSION['icon'] = "danger";
                }

            }
    
        }else {
    
            $_SESSION['registration'] = "The validity of your link has expired";
            $_SESSION['icon'] = "danger";
        }
    
    }else {
    
        exit(header('location: index.php'));
    }



}else {

    exit(header('location: index.php'));
}