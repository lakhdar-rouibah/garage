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
$work =  new service\Seed('WORKPLACE');
$period =  new service\Seed('PERIOD');

// variabele $ok equal false
$ok = 0;


// search all in table WORKPLACE
$select = $work->search_in_table("*", null);
$select_period = $period->search_in_table("*", null);

// search id_workplace if name equal admin
foreach($select as $val){

    if($val['name'] == 'admin'){

        // if name equal admin store id_workplace in variabel $ad
        $ad = $val['id_workplace'];
    }
}


if($_POST){

    // search all in table admin
    $src_ad = $admin->search_in_table("*", null);

    if(!$src_ad){

        // if tabel Admin is empty $ok equal true
        $ok = 1;
    }

    if ($ok == 1 and $_POST['id_workplace'] != $ad){

        // set $_SESSION['registeration'] equal "You must choose admin in Privilege"
        // if variable $ok = false and $_POST['id_workplace'] don't equal admin id_workplace
        $_SESSION['registration'] = "You must choose admin in Privilege!";
        $_SESSION['icon'] = "danger";


    }else {

        $array = array("mail"=>$_POST['mail']);
        $res = $admin->search_in_table("*", $array);

        if (!$res){

            // check if it not null
            $array = array('first_name', 'name', 'mail', 'tel', 'date_hiring', 'id_period', 'password');
            $return = service\Tools::is_empty($_POST, $array);

            

            if(!$return){

                $_SESSION['registration'] = $admin->insert_in_table($_POST);

                if (!$_SESSION['registration']) {

                    $_SESSION['registration'] = "Registration success";
                    $_SESSION['icon'] = "success";

                    // genrate code for token password
                    $code = service\Tools::code();
                    // create url
                    $url = "http://lakhdar.ovh/index.php?rec=Password%code=".$code;

                    service\tools::pass($code, "admin"); 

                    $message = "Bonjour M.".$_POST['first_name']." ".$_POST['name']." GALE VEHICLE vous souhaie le bienvenue dans l'entreprise ";
    
                    $tel = $_POST['tel'];
                    
                    shell_exec('echo "'.$message.'" | gammu-smsd-inject TEXT '.$tel.'');
    
                    
                    $to = $_POST['mail'];
                    $mail_sub ="confirmation inscription";
                    $msg ="Bonjour M.".$_POST['first_name']." ".$_POST['name']."n GALE VEHICLE vous souhaite le bienvenue dans l'entreprise\n
                    vous avvez ce lien pour mettre a jour votre mot de passe ".$url;
                    
                    $mail = service\Tools::send_mail($to, $mail_sub, $msg);
    
                    if($mail === "ok"):
                        exit(header('location: ?rec=Success&msg=Admin&mail='.$to));
                    endif;
                    
                }

            }else {
                $_SESSION['registration'] = $return;
                $_SESSION['icon'] = "danger";

            }
                
            

        }else {

            $_SESSION['registration'] = "Adress mail used! ";
        }

    }
    
    
}

