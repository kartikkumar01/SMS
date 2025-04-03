<?php
session_start();
$id = $_SESSION['user_id'];
include('../include/response_function.php');
include('../include/connect_db.php');

//fetch the user stocks from the portfolio
$fetch_stocks_query = "SELECT * FROM portfolio WHERE user_id = $id";
try{
    $table = mysqli_query($con, $fetch_stocks_query);
    $no_of_rows = mysqli_num_rows($table);
    if($no_of_rows == 0){
        echo response(false, "You don't have any stocks to sell.");
        exit;
    }else{
        //This will contain symbol => quantity key value pairs
        $stocksList = array();

        $row = mysqli_fetch_assoc($table);
        while($row){
            $stocksList += [$row['symbol'] => $row['quantity']];
            $row = mysqli_fetch_assoc($table);
        }
        echo response(true , $stocksList);
        exit;
    }
}catch(Exception $e){
    echo response(false, "Some Error occured !");
    exit;
}
?>