<div class="row row-sepa"></div>

<div class="row row-login">
    <div class="col-lg-4 col-sm-2"></div>
    <div class="col-lg-4 col-sm-8 item-login mt-5 mb-5" >
        <form action="" method="post">

            <?PHP

                if ($_SESSION['registration']):
            ?>

                <div class="alert alert-<?= $_SESSION['icon'];?>" role="alert">
                    <?= $_SESSION['registration']; ?>
                </div>

            <?PHP

                $_SESSION['registration'] = null;
                endif;
            ?>
            <div class="form-group">
                <input type="email" class="form-control" id="mail" name="mail" placeholder="Enter email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
            </div>
            <div class="form-group d-flex justify-content-end">
                <a href="?rec=Forgot&user=admin"><span class="btn mr-3">Forgot password</span></a> <button type="submit" class="btn">Submit</button>
            </div>
        </form>
    </div>
    <div class="col-lg-4 col-sm-2"></div>
</div>

<div class="row row-sepa"></div>
<div class="row row-home ">
        <div class="col-lg-4 col-sm-2"></div>
        <div class=" col-lg-4 col-sm-8 mt-5 mb-5">
            <img class="d-block w-100" src="./img/logo.png">
        </div>
        <div class="col-lg-4 col-sm-2"></div>

</div>



