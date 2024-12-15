<?php
    include('Database/connect.php');
    $title = "Home";
    $css = "CSS/index.css";
    include('include/header.php');
?>

<div class="container"> 
    <h2>List to do</h2>
    <?php 
    if(isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        '.$msg.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    } 
    if(isset($_GET['msg-update'])) {
        $msg_update = $_GET['msg-update'];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        '.$msg_update.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if(isset($_GET['msg-delete'])) {
        $msg_delete = $_GET['msg-delete'];
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        '.$msg_delete.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    
    ?>
    <table class="table table-hover text-center">
      <thead class="table-info">
        <tr>
          <th scope="col">No.</th>
          <th scope="col">List</th>
          <th scope="col">Priority Level</th>
          <th scope="col">Date</th>
          <th scope="col">Conduct</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            $sql = "SELECT * FROM `tb_plan`";
            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['list'] ?></td>
                    <td><?php echo $row['level'] ?></td>
                    <td><?php echo $row['date'] ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']?>" class="link-dark">
                            <i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                        <a href="#" class="link-dark" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['id']; ?>">
                            <i class="fa-solid fa-trash fs-5"></i>
                        </a>
                        <div class="modal fade" id="deleteModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div id="modal" class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        You will not be able to recover this item.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        
                                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Delete!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
            }
        ?>
      </tbody>
    </table>
    <a href="insert.php" type="submit" id="add" class="btn">Increase</a>
</div>
<?php include ('include/footer.php') ?>
