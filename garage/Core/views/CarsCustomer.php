<div class="row row-desktop">
    <div class=" col-xs-0 col-lg-1"></div>
    <div class="col-lg-10 col-xm-12">
        <div class="d-flex flex-wrap justify-content-center">

            <? if($_cars):
            
            foreach($_cars as $val): ?>
            <div class="card col-lg-3 col-sm-5 col-xm-12 p-0 m-3">
                <img class="card-img-top" src="./img/<?php
                if (    
                        $val[2] == "Audi" || 
                        $val[2] == "Bmw" || 
                        $val[2] == "Citroen" || 
                        $val[2] == "Fiat" || 
                        $val[2] == "Ford" || 
                        $val[2] == "Mercedes" ||
                        $val[2] == "Opel" ||
                        $val[2] == "Peugeot" ||
                        $val[2] == "Renault" ||
                        $val[2] == "Volkswagen"  )
                    {
                            echo $val[2];
                    }else {

                        echo "Default";
                    }
                            
                            
                        ?>.jpg" alt="Card image cap">
                        
                <div class="card-body">
                    <h5 class="card-title">Mark : <?= $val[2] ?></h5>
                    <h6 class="card-title">Model : <?= $val[3] ?></h6>
                    <h6 class="card-title">Register number : <?= $val[4] ?></h6>
                    <h6 class="card-title">Kilometers : <?= $val[5] ?></h6>
                    <h6 class="card-title">Month : <?= $val[6] ?></h6>
                    <h6 class="card-title">Year : <?= $val[7] ?></h6>

                    <?php   
                    
                        $select_take = $take->search_in_table("*", array("id_car"=>$val[1])); 

                        if($select_take){

                            foreach($select_take as $v){

                                $select_appoint = $appoint->search_in_table("*", array("id_appointement"=>$v['id_appointement'])); 

                    ?>
                                <div class="alert alert-success text-center" role="alert">
                                    <h5>Appointement : <?= $v['date']; ?></h5> 
                                    AT <strong><?= $select_appoint[0]['app'] ?> o'clock</strong>
                                </div>
                                <a href="?req=Enter&id=<?= $val[1]?>&date=<?= $v['date']?>" class=""><button class="btn mt-3 pt-4 pb-4" >Enter</button></a>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <? endforeach; 
                endif;?>
        </div>
    </div>
    <div class=" col-xs-0 col-lg-1"></div>
</div>