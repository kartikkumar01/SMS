<?php
session_start();
include('../include/response_function.php');
include('../include/connect_db.php');
$id = $_SESSION['user_id'];
$fetch_balance_query = "SELECT * FROM user WHERE id = $id;";
try{
    $table = mysqli_query($con,$fetch_balance_query);
    $row = mysqli_fetch_assoc($table);
    echo response(true,$row['balance']);
}catch(Exception $e){
    echo response(false,'Balance not found');
}
?>