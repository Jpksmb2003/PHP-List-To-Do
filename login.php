<?php
    include('Database/connect.php');
    $title = "Profile";
    $css = "CSS/auth.css";
    include('include/header.php');
?>
<?php
    if(isset($_SESSION["email"])) {
        header("location:index.php");
        exit;
    }
    
    $email = "";
    $error = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            $error = "Email and Password are required!";
        }else {
            $statement = $connection->prepare(
                "SELECT id, first_name, last_name, email, password, create_at FROM users WHERE email = ?"
            );

            $statement->bind_param('s', $email);
            $statement->execute();

            $statement->bind_result($id, $first_name, $last_name, $email, $stored_password, $create_at);
            
            if($statement->fetch()){ 
                if(password_verify($password, $stored_password)){

                    $_SESSION["id"] = $insert_id;
                    $_SESSION["first_name"] = $first_name;
                    $_SESSION["last_name"] = $last_name;
                    $_SESSION["email"] = $email;
                    $_SESSION["create_at"] = $create_at;
    
                    header("location: index.php");
                    exit;
                }
            }

            $statement->close();

            $error = "Email or Password invalid";
        }
    }
?>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6- mx-auto border shadow p-4">
                <h2 class="text-center mb-4">Welcome Back</h2>
                <hr />
                <?php if (!empty($error)) { ?>
                         <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?= $error ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                    <?php } ?>

                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control" name="email" value="<?= $email ?>">
                        <span class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password*</label>
                        <input class="form-control" type="password" name="password">
                        <span class="text-danger"></span>
                    </div>

                    <div class="row mb-3">
                        <div class="col d-grid">
                            <button type="submit" class="btn btn-primary">Log in</button>
                        </div>
                        <div class="col d-grid">
                            <a href="welcome.php" class="btn btn-outline-primary">Cancel</a>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>


<?php include ('include/footer.php') ?>



