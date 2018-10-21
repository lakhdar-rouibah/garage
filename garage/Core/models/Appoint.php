<?php
// name of project Miramis.
// Author :  lakhdar.
// Create in  2018-09-14 at 13:45:36.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr


namespace models ;
use models as models;
use app\kernel\service as service;

$appoint =  new service\Seed('APPOINTMENT');
$take =  new service\Seed('TAKE');

// recovred appointement in table APPOINTEMENT
$res_appoint = $appoint->search_in_table("*", null);
$array = array("date"=>strtotime($_GET['date']));
// get appointement in table TAKE where date equal $_GET['date']
$res_take = $take->search_in_table("*", $array);

// get thedifferent array and store it in variable $result
$result = service\Tools::diff_array($res_appoint, $res_take);

$var = array();

foreach($result as $val){

    $res = $appoint->search_in_table("*", array("id_appointement"=> $val['id_appointement']));
    array_push($var, $res);
}

// encode $result in var
$var = json_encode($var);

// empty all
ob_clean();
    //echo $var;
    echo $var;
// stop here
die();