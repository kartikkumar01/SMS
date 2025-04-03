<?php
session_start();
$id = $_SESSION['user_id'];
include('../include/response_function.php');
include('../include/connect_db.php');

//fetch the transactions
$fetch_stocks_query = "SELECT * FROM transaction WHERE user_id = $id";
try{
    $table = mysqli_query($con, $fetch_stocks_query);
    $no_of_rows = mysqli_num_rows($table);
    if($no_of_rows == 0){
        echo response(false, "You don't have any transactions.");
        exit;
    }else{
        //This will contain symbol => quantity key value pairs
        $stocksList = array();

        $row = mysqli_fetch_assoc($table);
        while($row){
            array_push($stocksList, $row);
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

