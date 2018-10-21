<div class="row row-sepa"></div>

<div class="row row-cancel">
    <div class="col-lg-4 col-sm-2"></div>
    <div class="col-lg-4 col-sm-8 cancel mt-5 mb-5" >
        <div class="alert alert-<?= $_SESSION['icon'] ?> text-center" role="alert">

            <h3><?= $_SESSION['registration'] ?></h3> 
            <a href="index.php"><button class="btn">Return</button></a>
            <?php
                $_SESSION['registration'] = null;
            ?>
        </div>
    </div>
    <div class="col-lg-4 col-sm-2"></div>
</div>

<div class="row row-sepa"></div>