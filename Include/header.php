<?php
//Initialize the session
session_start();

$authenticated = false;
if(isset($_SESSION["email"])) {
    $authenticated = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $css; ?>" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom shadow-sm px-2">
        <div class="container-fluid">
            <a class="navbar-brand" href="welcome.php">WHAT SHOULD I DO??</a>
            <?php
                if($authenticated) {
                ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Your list</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="weather.php">Weather</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="contact.php">Contact</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <?php
                }else {
                ?>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="register.php" id="register" class="btn btn-outline-primary me-2">Crate Account</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" id="login" class="btn btn-primary">Log in</a>
                    </li>
                </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>