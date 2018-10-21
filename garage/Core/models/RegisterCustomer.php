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

// instantiate table CUSTOMER
$customer =  new service\Seed('CUSTOMER');
$password =  new service\Seed('PASSWORD');
$c_change =  new service\Seed('CUST_CHANGE');

if($_POST){

    // search all in table CUSTOMER
    $mail = array("mail" => $_POST['mail']);
    $src_ad = $customer->search_in_table("*", $mail);

    if(!$src_ad){

        // check if not equal null
        $array = array('first_name', 'name', 'mail', 'tel', 'address', 'zip', 'city', 'password');
        
        // add check mail in last of array $_POST
        $push = array("check_mail"=>"null");
        $post = array_merge((array)$_POST, (array)$push);
        $return = service\Tools::is_empty($post, $array);

        if(!$return){

            // genrate code for token password
            $code = service\Tools::code();

            // create url
            $url = "http://lakhdar.ovh/index.php?rec=Validate%code=".$code;

            // insert customer data
            $_SESSION['registration'] = $customer->insert_in_table($post);

            service\tools::pass($code, "customer");

            $_SESSION['icon'] = "danger";
            if (!$_SESSION['registration']) {

                $_SESSION['registration'] = "Registration sccess";
                $_SESSION['icon'] = "success";

                $message = "Bonjour M.".$_POST['first_name']." ".$_POST['name']." GALE VEHICLE vous remercie pour votre confiance et confirme votre inscription 
                merci de clicker sur ce lien pour activer votre compte ";

                $tel = $_POST['tel'];
                
                shell_exec('echo "'.$message.'" | gammu-smsd-inject TEXT '.$tel.'');

                
                $to = $_POST['mail'];
                $mail_sub ="confirmation inscription";
                $msg ="Bonjour M.".$_POST['first_name']." ".$_POST['name']." GALE VEHICLE vous souhaite le bienvenue et vous confirme votre inscription 
                merci de clicker sur ce lien pour activer votre compte ".$url;
                
                $mail = service\Tools::send_mail($to, $mail_sub, $msg);

                if($mail === "ok"):
                    exit(header('location: ?rec=Success&msg=registerCustomer&mail='.$to));
                endif;

                
            }
        }else {

            $_SESSION['registration'] = $return;
            $_SESSION['icon'] = "danger";

        }
    }else {

        $_SESSION['registration'] = "Address mail existe!";
        $_SESSION['icon'] = "danger";

    }
}