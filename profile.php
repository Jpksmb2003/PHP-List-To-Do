<?php
    include('Database/connect.php');
    $title = "Login";
    $css = "CSS/auth.css";
    include('include/header.php');
?>
<?php
    if(!isset($_SESSION["email"])) {
        header("location:login.php");
        exit;
    }
?>
    <div class="container py-5">
        <div class="row">
            <div class="col mx-auto boder shadow p-4">
                <h2 class="text-center mb-4">Profile</h2>
                <hr />

                <div class="row mb-3">
                    <div class="col-sm-4">First Name</div>
                    <div class="col-sm-8"><?=$_SESSION["first_name"] ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">Last Name</div>
                    <div class="col-sm-8"><?=$_SESSION["last_name"] ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">Email</div>
                    <div class="col-sm-8"><?=$_SESSION["email"] ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">Registered At</div>
                    <div class="col-sm-8"><?=$_SESSION["create_at"] ?></div>
                </div>
            </div>
        </div>
    </div>




<?php include ('include/footer.php') ?>



