<div class="row row-home ">
        <div class="col-lg-4 col-sm-2"></div>
        <div class=" col-lg-4 col-sm-8 mt-5 mb-5">
            <img class="d-block w-100" src="./img/logo.png">
        </div>
        <div class="col-lg-4 col-sm-2"></div>

</div>

<div class="row row-sepa"></div>

<div class="row row-login">
    <div class="col-lg-4 col-sm-2"></div>
    <div class="col-lg-4 col-sm-8 item-login mt-5 mb-5" >
        <form method="post" action= "">
            <?php
                if($_SESSION['registration']):
            ?>
                <div class="alert alert-<?=$_SESSION['icon']?>" role="alert">
                <?= $_SESSION['registration'] ?>
                </div>
            <?php 
            $_SESSION['registration'] = null;
            endif;
            ?>
            <div class="form-group bg-danger p-3 pb-5 rounded ">
            <label for="exampleFormControlSelect1">Privilege</label>
            <select class="form-control" id="privilege" name="id_workplace">
                <?php
                    foreach($select as $key=>$val):
                ?>
                <option value="<?=$val['id_workplace']?>"><?= $val['name']?></option>

                <?php endforeach;?>
            </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="mail" name="mail" placeholder="Enter email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="tel" name="tel" placeholder="Enter phone">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" id="date_hiring" name="date_hiring" placeholder="Enter date hiring">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" id="date_exit" name="date_exit" placeholder="Enter date exit">
            </div>
            <select class="form-control" id="contrat" name="id_period">
                <option value="">Enter type of contract</option>
                <?php
                    foreach($select_period as $key=>$val):
                ?>
                <option value="<?=$val['id_period']?>"><?= $val['name_period']?></option>

                <?php endforeach;?>
            </select>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn">Submit</button>
            </div>
        </form>
    </div>
    <div class="col-lg-4 col-sm-2"></div>
</div>

<div class="row row-sepa"></div>
