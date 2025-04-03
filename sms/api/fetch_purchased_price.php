<?php
session_start();
include('../include/response_function.php');
include('../include/connect_db.php');
$id = $_SESSION['user_id'];

$symbol = $_POST['symbol'];

$fetch_cur_price_query = "SELECT * FROM portfolio WHERE user_id = $id AND symbol = '$symbol';";
try{
    $table = mysqli_query($con,$fetch_cur_price_query);
    $row = mysqli_fetch_assoc($table);
    $invested_amount = $row['invested_amount'];
    $quantity = $row['quantity'];
    $pur_price = $invested_amount / $quantity;
    echo response(true,$pur_price);
}catch(Exception $e){
    echo response(false,'- -');
    exit;
}
?>