<?php
session_start();
$id = $_SESSION['user_id'];
include('../include/response_function.php');
include('../include/connect_db.php');

//fetch the transactions
$fetch_portfolio_query = "SELECT symbol, quantity, invested_amount FROM portfolio WHERE user_id = $id";
try{
    $table = mysqli_query($con, $fetch_portfolio_query);
    $no_of_rows = mysqli_num_rows($table);
    if($no_of_rows == 0){
        echo response(false, "Your Portfolio is Empty.");
        exit;
    }else{
        //This will contain associative arrays of transaction list
        $portfolioList = array();

        $row = mysqli_fetch_assoc($table);
        while($row){
            array_push($portfolioList, $row);
            $row = mysqli_fetch_assoc($table);
        }
        echo response(true , $portfolioList);
        exit;
    }
}catch(Exception $e){
    echo response(false, "Some Error occured !");
    exit;
}
?>

