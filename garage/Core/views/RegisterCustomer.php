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
                if($_SESSION['registration'] != null):
            ?>
                <div class="alert alert-<?=$_SESSION['icon']?>" role="alert">
                <?= $_SESSION['registration'] ?>
                </div>
            <?php 
            $_SESSION['registration'] = null;
            endif;
            ?>
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
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="zip" name="zip" placeholder="Enter zip">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="city" name="city" placeholder="Enter city">
            </div>
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
