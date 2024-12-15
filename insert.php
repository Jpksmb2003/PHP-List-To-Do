<?php
$title = "More";
$css = "CSS/form.css";
include_once 'include/header.php';
?>

<?php
include "Database/connect.php";
    $list = "";
    $level = "";
    $data = "";
    $date = isset($date) ? $date : "";

    $list_error = "";
    $level_error = "";
    $date_error = isset($date_error) ? $date_error : "";
    
    $error = false;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $list = $_POST['list'];
        $level = $_POST['level'];
        $date = $_POST['date'];

        //all validate
        if(empty($list)) {
            $list_error = "List is required";
            $error = true;
        }
        
        if(empty($level)) {
            $level_error = "Level is required";
            $error = true;
        }
        if(empty($date)) {
            $date_error = "Please enter date";
            $error = true;
        }
        
        if(!$error) {
            
            $sql = "INSERT INTO `tb_plan`(`id`, `list`, `level`, `date`) VALUES (NULL,'$list','$level','$date')";
        
            $result = mysqli_query($connection, $sql);

            if($result) {
                header("Location: index.php?msg=<strong>New</strong> list has been <strong>added</strong> successfully.");
            }else {
                echo "Failed" . mysqli_error($connection);
            }
        }
    }
    
?>
<div class="container">
    <h2>More your list</h2>
    <div>
        <form action="" method="post">
            <div>
                <label class="form-label">List</label>
                <input type="text" class="form-control" name="list" placeholder="Your list" 
                value="<?php echo $list ?>">
                <span class="text-danger"><?= $list_error?></span>
            </div>
            <div>
                <label class="form-label">Priority Levels</label>
                <input type="text" class="form-control" name="level" placeholder="Your Level"
                value="<?php echo $level ?>">
                <span class="text-danger"><?= $level_error?></span>
            </div>
            <div>
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="date"
                value="<?php echo $date ?>">
                <span class="text-danger"><?= $date_error?></span>
            </div> 
            <div>
                <a href="index.php" class="btn">Back</a>
                <button type="submit" class="btn" name="submit">Add</button>
            </div>
        </form>
    </div>

</div>

<?php include ('include/footer.php') ?>