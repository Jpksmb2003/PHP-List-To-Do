<?php
include "Database/connect.php";
 
if (isset($_GET['id'])) { // ตรวจสอบว่ามีการส่งค่า id มาหรือไม่  
    $id = intval($_GET['id']); // การแปลง id เป็นจำนวนเต็มป้องกันความเสี่ยงจาก SQL Injection เพื่อให้แน่ใจว่าข้อมูลที่ส่งเข้าไปคือ จำนวนเต็ม (integer)
    $sql_delete = "DELETE FROM `tb_plan` WHERE id = ?";
    $stmt = mysqli_prepare($connection, $sql_delete);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // ถ้าลบสำเร็จ ทำการรีเซ็ตค่า id และ AUTO_INCREMENT
        $sql_set_num = "SET @num := 0;";
        mysqli_query($connection, $sql_set_num);
        
        $sql_update_id = "UPDATE tb_plan SET id = @num := (@num+1);";
        mysqli_query($connection, $sql_update_id);
        
        $sql_reset_auto_increment = "ALTER TABLE tb_plan AUTO_INCREMENT = 1;";
        mysqli_query($connection, $sql_reset_auto_increment);

        // ปิดการเชื่อมต่อฐานข้อมูล
        mysqli_close($connection);

        // เปลี่ยนเส้นทางกลับไปที่หน้า index พร้อมข้อความแจ้งเตือน
        header("Location: index.php?msg-delete=Your list has been <strong>deleted</strong> successfully.");
        exit(); // ป้องกันไม่ให้โค้ดส่วนที่เหลือทำงานหลังจาก header redirection
    } else {
        // ถ้าเกิดข้อผิดพลาดในการลบข้อมูล
        echo "Failed: " . mysqli_error($connection);
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    mysqli_stmt_close($stmt);
} else {
    echo "Error: ID not set";
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($connection);
?>