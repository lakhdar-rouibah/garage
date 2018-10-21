<div class="row row-sepa"></div>

<div class="row row-cancel">
    <div class="col-lg-4 col-sm-2"></div>
    <div class="col-lg-4 col-sm-8 cancel mt-5 mb-5" >
        <div class="alert alert-success text-center" role="alert">

            <?php
                if($_GET['msg'] === "registerCustomer"){
            ?>
            <h3>Customer register with success</h3> 
                You receive a link on your mailbox <h4> <?= $_GET['mail'] ?> </h4> to activate your account</p>
            <a href="index.php"><button class="btn">Return</button></a>
            <?php
                }else if($_GET['msg'] === "Admin"){
                ?>
                <h3>Staff register with success</h3> 
                    You receive a link on your mailbox <h4> <?= $_GET['mail'] ?> </h4> to change the password of your account</p>
                <a href="index.php"><button class="btn">Return</button></a>
            <?php
                }else if($_GET['msg'] === "change"){
                    ?>
                    <h3>Mail founded</h3> 
                        You receive a link on your mailbox <h4> <?= $_GET['mail'] ?> </h4> to change the password of your account</p>
                    <a href="index.php"><button class="btn">Return</button></a>
                <?php
                    }

                    $_SESSION['registration'] = null;
                ?>
        </div>
    </div>
    <div class="col-lg-4 col-sm-2"></div>
</div>

<div class="row row-sepa"></div>
