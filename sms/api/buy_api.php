<?php
session_start();
$id = $_SESSION['user_id'];
include('../include/response_function.php');
include('../include/connect_db.php');


//Empty fields validation
if($_POST['symbol'] == ''){
    echo response(false, 'Some Error occured!');
    exit;
}else{
    $symbol = $_POST['symbol'];
}
if($_POST['currPrice'] == ''){
    echo response(false, 'Some Error occured!');
    exit;
}else{
    $price = (float) $_POST['currPrice'];
}
if($_POST['quantity'] == ''){
    echo response(false, 'Some Error occured!');
    exit;
}else{
    $quantity = (int) $_POST['quantity'];
}
$totalAmount = $price * $quantity;


//Fetching the balance
$fetch_balance_query = "SELECT balance FROM user WHERE id = $id;";
try{
    $table = mysqli_query($con,$fetch_balance_query);
    $row = mysqli_fetch_assoc($table);
    $balance = $row['balance'];
}catch(Exception $e){
    echo response(false,'Some Error occured ! ');
    exit;
}



//Checking if user has sufficient balance
if($totalAmount > $balance){
    echo response(false, 'Insufficient Balance !!');
    exit;
}

//deduct the balance
$remainingBalance = $balance - $totalAmount;
$deduct_balance_query = "UPDATE user SET balance = $remainingBalance WHERE id = $id;";
try{
    mysqli_query($con,$deduct_balance_query);
}catch(Exception $e){
    echo response(false, 'Some error occured ! ');
    exit;
}


//add the transaction
$transaction_query = "INSERT INTO transaction (user_id, symbol, transaction_type, price_per_share, quantity, transaction_amount) VALUES ($id,'$symbol','Buy', $price, $quantity, $totalAmount);";
try{
    mysqli_query($con,$transaction_query);
}catch(Exception $e){
    echo response(false, 'Some error occured ! ');
    exit;
}

//add stock to the portfolio
$check_stock_query = "SELECT * FROM portfolio WHERE user_id = $id AND symbol = '$symbol';";
try{
    $table = mysqli_query($con, $check_stock_query);
    $no_of_rows = mysqli_num_rows($table);
}catch(Exception $e){
    echo response(false, 'Some Error occured !');
    exit;
}

if($no_of_rows == 0){
    //First time query
    $portfolio_query1 = "INSERT INTO portfolio (user_id, symbol, quantity, invested_amount) VALUES ($id, '$symbol', $quantity, $totalAmount);";
    try{
        mysqli_query($con, $portfolio_query1);
    }catch(Exception $e){
        echo response(false, 'Some error occured !');
        exit;
    }
}else{
    //other time query
    $portfolio_query2 = "UPDATE portfolio SET quantity = quantity + $quantity, invested_amount = invested_amount + $totalAmount WHERE user_id = $id;";
    try{
        mysqli_query($con, $portfolio_query2);
    }catch(Exception $e){
        echo response(false, 'Some error occured !');
        exit;
    }
}

echo response(true, 'Stock Purchased Sucessfull');
?>