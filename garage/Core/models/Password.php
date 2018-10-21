<?php
// name of project Miramis.
// Author :  lakhdar.
// Create in  2018-09-03 at 15:17:13.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

namespace models ;
use models as models;
use app\kernel\service as service;
use  Core\app\controlers as controlers;

// instantiate table Admin, WORKPLACE, PERIOD
$admin =  new service\Seed('Admin');
$password =  new service\Seed('PASSWORD');
$admin_change =  new service\Seed('ADMIN_CHANGE');

if(isset($_GET['code'])){

    //check token
    $arr_id_password = service\Tools::search_with("*", "PASSWORD", "WHERE token='".$_GET['code']."' AND state IS NULL");

    // if result
    if($arr_id_password){

        // get id_password
        $id_password = $arr_id_password[0]['id_password'];
        // get date 
        $date_token = $arr_id_password[0]['date'];
        // date now
        $date = date('d-m-Y H:i:s');
        // get on day value in timestamps
        $day = strtotime("+1 day");

        // if diffirent into date now and date token < 24h 
        if(($date - $date_token) < $day){

            // if isset password an dissat password confirmation
            if(isset($_POST['password']) and isset($_POST['password_conf'])){

                // if passwords equals
                if($_POST['password'] === $_POST['password_conf']){

                    // chack validate of password 
                    $return = service\tools::check_password($_POST['password']);

                    if($return !== false){

                        
                        // get id_admin
                        $arr_id_admin = service\Tools::search_with("*", "ADMIN_CHANGE", "WHERE id_password='".$arr_id_password[0]['id_password']."'");

                        $condition = array("id" =>$arr_id_admin[0]['id']);
                        // update password ADMIN
                        $admin->update_table (array("password" => $return), $condition);

                        $condition = array("token" =>$_GET['code']);
                        // update SATE PASSWORD
                        $password->update_table (array("state" => 1), $condition);

                        $_SESSION['registration'] = "Password uploaded";
                        $_SESSION['icon'] = "success";

                        exit(header('location: ?rec=Login'));

                    }else {

                        $_SESSION['registration'] = "Error password not valide";
                        $_SESSION['icon'] = "danger";
                    }

                }else {

                    $_SESSION['registration'] = "Error passwords diffirent";
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



}else{

    exit(header('location: index.php'));

}

