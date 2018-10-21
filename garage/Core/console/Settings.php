<?php
use app\kernel\service as service;
use  Core\app\controlers;


// instance tables WORKPLACE,PERIOD, MARK, MONTH, YEAR, RAY, Admin
$work =  new service\Seed('WORKPLACE');
$period =  new service\Seed('PERIOD');
$mark =  new service\Seed('MARK');
$month =  new service\Seed('MONTH');
$year =  new service\Seed('YEAR');
$ray =  new service\Seed('RAY');
$appointment =  new service\Seed('APPOINTMENT');
$admin =  new service\Seed('Admin');


// search data in table WORKPLACE
$select = $work->search_in_table("*", null);

// search data in table Admin
$ad = $admin->search_in_table("*", null);

if(!$select){

    // array for workplace
    $staff = array(    
                        array("id_workplace"=>0, "name"=>"admin"), 
                        array("id_workplace"=>0, "name"=>"mechanic"),   
                        array("id_workplace"=>0, "name"=>"metal worker"),   
                        array("id_workplace"=>0, "name"=>"trainee")
                    );

    // array for mark
    $marks = array(    
                        array("id_mark"=>0, "mark"=>"Audi"), 
                        array("id_mark"=>0, "mark"=>"Bmw"),   
                        array("id_mark"=>0, "mark"=>"Citroen"),   
                        array("id_mark"=>0, "mark"=>"Fiat"),   
                        array("id_mark"=>0, "mark"=>"Ford"),   
                        array("id_mark"=>0, "mark"=>"Mercedes"),   
                        array("id_mark"=>0, "mark"=>"Opel"),   
                        array("id_mark"=>0, "mark"=>"Peugeot"),   
                        array("id_mark"=>0, "mark"=>"Renault"),   
                        array("id_mark"=>0, "mark"=>"Volkswagen"),   
                        array("id_mark"=>0, "mark"=>"Abarth"),   
                        array("id_mark"=>0, "mark"=>"Aleko"),   
                        array("id_mark"=>0, "mark"=>"Alfa Romeo"),   
                        array("id_mark"=>0, "mark"=>"Alpina"),   
                        array("id_mark"=>0, "mark"=>"Aro"),   
                        array("id_mark"=>0, "mark"=>"Artega"),   
                        array("id_mark"=>0, "mark"=>"Aston Martine"),   
                        array("id_mark"=>0, "mark"=>"Auto Bianchi"),   
                        array("id_mark"=>0, "mark"=>"Auverland"),   
                        array("id_mark"=>0, "mark"=>"Bentley"),   
                        array("id_mark"=>0, "mark"=>"Bertone"),   
                        array("id_mark"=>0, "mark"=>"Bluecar Groupe Bellore"),   
                        array("id_mark"=>0, "mark"=>"Buick"),   
                        array("id_mark"=>0, "mark"=>"Cadillac"),   
                        array("id_mark"=>0, "mark"=>"Chevrolet"),   
                        array("id_mark"=>0, "mark"=>"Chrisler"),   
                        array("id_mark"=>0, "mark"=>"Corvette"),   
                        array("id_mark"=>0, "mark"=>"Dacia"),   
                        array("id_mark"=>0, "mark"=>"Daewoo"), 
                        array("id_mark"=>0, "mark"=>"Daihatsu"), 
                        array("id_mark"=>0, "mark"=>"Dangel"), 
                        array("id_mark"=>0, "mark"=>"De La Chapelle"), 
                        array("id_mark"=>0, "mark"=>"Donkervoort"), 
                        array("id_mark"=>0, "mark"=>"DS"), 
                        array("id_mark"=>0, "mark"=>"Ferrari"), 
                        array("id_mark"=>0, "mark"=>"Fisker"), 
                        array("id_mark"=>0, "mark"=>"GME"), 
                        array("id_mark"=>0, "mark"=>"Honda"), 
                        array("id_mark"=>0, "mark"=>"Hummer"), 
                        array("id_mark"=>0, "mark"=>"Hyundai"), 
                        array("id_mark"=>0, "mark"=>"Infinity"), 
                        array("id_mark"=>0, "mark"=>"Isuzu"), 
                        array("id_mark"=>0, "mark"=>"Iveco"), 
                        array("id_mark"=>0, "mark"=>"Jaguar"), 
                        array("id_mark"=>0, "mark"=>"Jeep"), 
                        array("id_mark"=>0, "mark"=>"KIA"), 
                        array("id_mark"=>0, "mark"=>"Lada"), 
                        array("id_mark"=>0, "mark"=>"Lambourghini"), 
                        array("id_mark"=>0, "mark"=>"Lancia"), 
                        array("id_mark"=>0, "mark"=>"Land Rover"), 
                        array("id_mark"=>0, "mark"=>"Lexus"), 
                        array("id_mark"=>0, "mark"=>"Lotus"), 
                        array("id_mark"=>0, "mark"=>"Mahindra"), 
                        array("id_mark"=>0, "mark"=>"Mariti"), 
                        array("id_mark"=>0, "mark"=>"Maserati"), 
                        array("id_mark"=>0, "mark"=>"Mastretta"), 
                        array("id_mark"=>0, "mark"=>"Maybach"), 
                        array("id_mark"=>0, "mark"=>"Mazda"), 
                        array("id_mark"=>0, "mark"=>"Mclaren"), 
                        array("id_mark"=>0, "mark"=>"Mega"), 
                        array("id_mark"=>0, "mark"=>"MG"), 
                        array("id_mark"=>0, "mark"=>"Mia"), 
                        array("id_mark"=>0, "mark"=>"Mini"), 
                        array("id_mark"=>0, "mark"=>"Mutsubishi"), 
                        array("id_mark"=>0, "mark"=>"Morgane"), 
                        array("id_mark"=>0, "mark"=>"Nissan"), 
                        array("id_mark"=>0, "mark"=>"PGO"), 
                        array("id_mark"=>0, "mark"=>"Piaggot"), 
                        array("id_mark"=>0, "mark"=>"Polski/Fso"), 
                        array("id_mark"=>0, "mark"=>"Pontiac"), 
                        array("id_mark"=>0, "mark"=>"Porsche"), 
                        array("id_mark"=>0, "mark"=>"Prontone"), 
                        array("id_mark"=>0, "mark"=>"Rolls-Royce"), 
                        array("id_mark"=>0, "mark"=>"Rover"), 
                        array("id_mark"=>0, "mark"=>"Saab"), 
                        array("id_mark"=>0, "mark"=>"Santana"), 
                        array("id_mark"=>0, "mark"=>"Seat"), 
                        array("id_mark"=>0, "mark"=>"Shuanghuan"), 
                        array("id_mark"=>0, "mark"=>"Scoda"), 
                        array("id_mark"=>0, "mark"=>"Smart"), 
                        array("id_mark"=>0, "mark"=>"Ssangyong"), 
                        array("id_mark"=>0, "mark"=>"Subaru"), 
                        array("id_mark"=>0, "mark"=>"Suzuki"), 
                        array("id_mark"=>0, "mark"=>"Talbot"), 
                        array("id_mark"=>0, "mark"=>"Tavria"), 
                        array("id_mark"=>0, "mark"=>"Tesla"), 
                        array("id_mark"=>0, "mark"=>"Toyota"), 
                        array("id_mark"=>0, "mark"=>"TVR"), 
                        array("id_mark"=>0, "mark"=>"Venturi"), 
                        array("id_mark"=>0, "mark"=>"Volvo"),   
                        array("id_mark"=>0, "mark"=>"Other")
                    );

        $months = array(    
                        array("id_month"=>0, "month"=>"January"), 
                        array("id_month"=>0, "month"=>"February"),   
                        array("id_month"=>0, "month"=>"March"),   
                        array("id_month"=>0, "month"=>"April"),   
                        array("id_month"=>0, "month"=>"May"),   
                        array("id_month"=>0, "month"=>"June"),   
                        array("id_month"=>0, "month"=>"July"),   
                        array("id_month"=>0, "month"=>"August"),   
                        array("id_month"=>0, "month"=>"september"),   
                        array("id_month"=>0, "month"=>"October"),   
                        array("id_month"=>0, "month"=>"November"),   
                        array("id_month"=>0, "month"=>"December")   
                    );

        $periods = array(    
                        array("id_period"=>0, "name_period"=>"CDI"),     
                        array("id_period"=>0, "name_period"=>"CDD"),     
                        array("id_period"=>0, "name_period"=>"Apprenticeship"),     
                        array("id_period"=>0, "name_period"=>"Traineeship")     
                    );

        $appointments = array(    
                        array("id_appointement"=>0, "app"=>"08:00"),
                        array("id_appointement"=>0, "app"=>"10:00"),
                        array("id_appointement"=>0, "app"=>"14:00"),
                        array("id_appointement"=>0, "app"=>"16:00")      
                    );

    // insert data for WORKPLACE
    foreach($staff as $st){

        $work->insert_in_table($st);
    }

    // insert data for APPOINTMENT
    foreach($appointments as $app){

        $appointment->insert_in_table($app);
    }

    // insert data for PERIOD
    foreach($periods as $per){

        $period->insert_in_table($per);
    }
    
    // insert data for MARK
    foreach($marks as $mar){

        $mark->insert_in_table($mar);
    }

    // insert data for MONTH
    foreach($months as $mon){

        $month->insert_in_table($mon);
    }

    // insert data for YEAR
    for ($i = 1945; $i <= date("Y"); $i++){

        $year->insert_in_table(array("id_month"=>0, "year"=>$i));
    }    
    
    // insert data for RAY
    for ($i = 1; $i <= 700; $i++){

        $ray->insert_in_table(array("id_ray"=>0, "ray"=>$i));
    }


}

// if table Admin is empty
if(!$ad){

    
    // open Register form
    $rooter = new controlers\Controler('Register');

}else {

    // open home page
    $Controler = new controlers\Rooter('Home');
}
