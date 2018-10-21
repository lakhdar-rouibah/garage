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


// instantiate table Admin and store in variable $admin
$admin =  new service\Seed('Admin');
$customer =  new service\Seed('CUSTOMER');
$password =  new service\Seed('PASSWORD');
$c_change =  new service\Seed('CUST_CHANGE');
$a_change =  new service\Seed('ADMIN_CHANGE');


if ($_SESSION['login'] != null){

    exit(header('location: ?req=DeskTop'));

}else if ($_SESSION['loginCustomer'] != null){

    exit(header('location: ?req=DeskTopCustomer'));
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    

    $mail = $_POST['mail'];

    $user  =$_GET['user'];
    
    // search in table Admin mail and password and sotre in variable $res_admin
    switch($user){

        case 'admin':
        $arr_id = service\Tools::search_with("*", "Admin", "WHERE mail='".$mail."'");
        break;
        case 'customer':
        $arr_id = service\Tools::search_with("*", "CUSTOMER", "WHERE mail='".$mail."'");
        break;


    }
    

    // if variable $res_admin existe
    if($arr_id){

        // get token
        $code = service\Tools::code();
        service\Tools::pass($code, $user);

        // generate the url
        $url = "http://lakhdar.ovh/index.php?rec=Change%code=".$code."%user=".$user;
        $name = $arr_id[0]['first_name']. " ".$arr_id[0]['name'];
        $to = $arr_id[0]['mail'];
        $mail_sub = "Mail to change your password";
        $msg = "Bonjour M.".$name."\n message de  GALE VEHICLE\n veilliez cliquer sur ce lien  ".$url." pour modifiez votre mot de pass";

        // send mail to 
        $mail = service\Tools::send_mail($to, $mail_sub, $msg);

        if($mail === "ok"):
            exit(header('location: ?rec=Success&msg=change&mail='.$to));
        endif;
        

        
    
    }else {

        // session login equal false 
        $_SESSION['registration'] = 'Email not found on the database';
        $_SESSION['icon'] = "danger";

    }
}

