<?php
    include('Database/connect.php');
    $title = "Register";
    $css = "CSS/auth.css";
    include('include/header.php');
?>
<?php
    $first_name = "";
    $last_name = "";
    $email = "";

    $first_name_error = "";
    $last_name_error = "";
    $email_error = "";
    $password_error = "";
    $confirm_password_error = "";

    $error = false;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        //all validate
        if(empty($first_name)) {
            $first_name_error = "First name is required";
            $error = true;
        }
        
        if(empty($last_name)) {
            $last_name_error = "Last name is required";
            $error = true;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Email format is not valid";
            $error = true;
        }

        $statement = $connection->prepare("SELECT id FROM users WHERE email = ?");
        $statement->bind_param("s", $email);
        $statement->execute();

        $statement->store_result();
        if ($statement->num_rows > 0){
            $email_error = "Email is already used";
            $error = true;
        }
        
        $statement->close();

        if(strlen($password) < 6) {
            $password_error = "Password must have at least 6 characters";
            $error = true;
        }

        if($confirm_password != $password) {
            $confirm_password_error = "Password and Confirm Password do not match";
            $error = true;
        }

        if (!$error) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $create_at = date('Y-m-d H:i:s');

            $statement = $connection->prepare(
                "INSERT INTO users (first_name, last_name, email, password, create_at) VALUES (?,?,?,?,?)"
            );

            $statement->bind_param('sssss', $first_name, $last_name, $email, $password, $create_at);
            $statement->execute();

            $insert_id = $statement->insert_id;
            $statement->close();

            $_SESSION["id"] = $insert_id;
            $_SESSION["first_name"] = $first_name;
            $_SESSION["last_name"] = $last_name;
            $_SESSION["email"] = $email;
            $_SESSION["create_at"] = $create_at;

            header("location: index.php");
            exit;

        }
        
        
    }
?>


    <div class="container py-5">
        <div class="row">
            <div class="mx-auto border shadow p-4">
                <h2 class="text-center mb-4">Crate Account</h2>
                <hr />

                <form method="post">
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">First Name*</label>
                        <div class="col-sm-8">
                            <input class="form-control" name="first_name" value="<?php echo $first_name ?>">
                            <span class="text-danger"><?= $first_name_error?></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Last Name*</label>
                        <div class="col-sm-8">
                            <input class="form-control" name="last_name" value="<?php echo $last_name ?>">
                            <span class="text-danger"><?= $last_name_error?></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Email*</label>
                        <div class="col-sm-8">
                            <input class="form-control" name="email" value="<?php echo $email ?>">
                            <span class="text-danger"><?= $email_error?></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Password*</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="password" name="password" value="">
                            <span class="text-danger"><?= $password_error?></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Confirm Password*</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="password" name="confirm_password" value="">
                            <span class="text-danger"><?= $confirm_password_error?></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="offset-sm-4 col-sm-4 d-grid">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                        <div class="col-sm-4 col-sm-4 d-grid">
                            <a href="welcome.php" class="btn btn-outline-primary">
                                Cancel
                            </a>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>


<?php include ('include/footer.php') ?>



