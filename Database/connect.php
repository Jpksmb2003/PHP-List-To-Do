<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "list_to_do";

$connection = mysqli_connect($servername, $username, $password, $database);

if(!$connection){
    die("Connection failed" . mysqli_connect_error());
}
// echo "Connection successfully";
?>