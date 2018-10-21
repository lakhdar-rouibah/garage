<?php

function send($to,$subject,$message,$header){

    $mail = mail($to,$subject,$message,$header);

}


if(isset($_POST['token']) and isset($_POST['subject'])  and isset($_POST['to']) and isset($_POST['message'])):

    $token = $_POST['token'];
    $subject = $_POST['subject'];
    $to = $_POST['to'];
    $message = $_POST['message'];
    $message = str_replace ( "%" , "&" , $message ); 
    $passage_ligne = "\n";
    $boundary = "-----=".md5(rand());
    $header = "From: \"lakhdar\"<lakhdar-rouibah@live.fr>".$passage_ligne;
    $header.= "Reply-to: \"lakhdar\" <lakhdar-rouibah@live.fr>".$passage_ligne;
    $header.= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
    
    if($token === "****************"){

        mail($to,$subject,$message,$header);
    }else {

        header('location: http://rouibah.fr');
    }

endif;
