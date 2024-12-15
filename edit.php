<?php
$title = "Edit";
$css = "CSS/form.css";
include_once 'include/header.php';
?>

<?php
include "Database/connect.php";

    $id = $_GET['id'];
    
    if(isset($_POST['submit'])) {
        $list = $_POST['list'];
        $level = $_POST['level'];
        $date = $_POST['date'];

        $sql = "UPDATE `tb_plan` SET `list`='$list',`level`='$level',`date`='$date' WHERE id=$id";
    
        $result = mysqli_query($connection, $sql);

        if($result) {
            header("Location: index.php?msg-update=Your list has been <strong>updated</strong> successfully.");
        }else {
            echo "Failed" . mysqli_error($connection);
        }
    }   
?>
    <?php 
    $sql = "SELECT * FROM `tb_plan` WHERE id = $id LIMIT 1";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container">
        <h2>Edit your list</h2>
        <div>
            <form action="" method="post">
                <div>
                    <label class="form-label">List</label>
                    <input type="text" class="form-control" name="list" placeholder="Your list" 
                    value="<?php echo $row['list'] ?>">
                </div>
                <div>
                    <label class="form-label">Priority Levels</label>
                    <input type="text" class="form-control" name="level" placeholder="Your Level"
                    value="<?php echo $row['level'] ?>">
                </div>
                <div>
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control" name="date" 
                    value="<?php echo $row['date'] ?>">
                </div> 
                <div>
                    <a href="index.php" class="btn">Back</a>
                    <button type="submit" class="btn" name="submit">Update</button>
                </div>
            </form>
        </div>

    </div>

<?php include_once 'include/footer.php'?>