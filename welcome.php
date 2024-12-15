<?php
    include('Database/connect.php');
    $title = "Welcome";
    $css = "CSS/index.css";
    include('include/header.php');
?>

<div class="container py-5 mt-5">
        <div class="row">
            <div class="col mx-auto boder shadow p-4">
                <h1 id="lgText" class="text-center mb-4">PHP MINI PROJECT 2024</h1>
                <hr />
                <p class="text-center mb-4">LIST-TO-DO </p>
                <h3 class="text-center mb-4">
                    If today is Monday, what should you do ???
                </h3>
            </div>
        </div>
    </div>

<?php include ('include/footer.php') ?>

