<?php
// name of project Miramis.
// Author :  lakhdar.
// Create in  2018-09-10 at 12:17:45.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// page to login

namespace models ;
use models as models;
use app\kernel\service as service;
use  Core\app\controlers as controlers;

$customer =  new service\Seed('CUSTOMER');
$password =  new service\Seed('PASSWORD');

$arr_id_password = service\Tools::search_with("*", "PASSWORD", "WHERE token='".$_GET['code']."' and state IS NULL");


if($arr_id_password){

    $id_password = $arr_id_password[0]['id_password'];
    $date_token = $arr_id_password[0]['date'];
    $date = date('d-m-Y H:i:s');
    $day = strtotime("+1 day");

    if(($date - $date_token) < $day){
        $arr_id_customer = service\Tools::search_with("id_customer", "CUST_CHANGE", "WHERE id_password = ".$id_password);
        $id_customer = $arr_id_customer [0]['id_customer'];
        $data = array("state" => 1);
        $condition = array("token" => $_GET['code']);
        $password->update_table($data, $condition);

        $customer->update_table(array("check_mail"=> 1), array("id_customer"=>$id_customer));

        $_SESSION['registration'] = "Your account is activated now";
        $_SESSION['icon'] = "success";

    }else {

        $_SESSION['registration'] = "The validity of your link has expired";
        $_SESSION['icon'] = "danger";
    }

}else {

    exit(header('location: index.php'));
}