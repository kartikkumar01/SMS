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

//check if the stock exists in the portfolio
$check_stock_query = "SELECT * FROM portfolio WHERE user_id = $id AND symbol = '$symbol';";
try{
    $table = mysqli_query($con, $check_stock_query);
    $no_of_rows = mysqli_num_rows($table);
    if($no_of_rows == 0){
        echo response(false, 'Stock do not exists in Portfolio.');
        exit;
    }else{
        $row = mysqli_fetch_assoc($table);
    }
}catch(Exception $e){
    echo response(false, 'Sell Failed -!');
    exit;
}

//check for the available quantity
if($quantity > $row['quantity']){
    echo response(false, 'Insufficient Stocks !');
    exit;
}

//check for the equal quantity
if($quantity == $row['quantity']){
    //Delete the whole record from PORTFOLIO
    $delete_query = "DELETE FROM portfolio WHERE user_id = $id AND symbol = '$symbol';";
    //Add the balance
    $transaction_amount = $quantity * $price;
    $add_balance_query = "UPDATE user SET balance = balance + $transaction_amount WHERE id = $id;";
    //Add the transaction
    $transaction_query = "INSERT INTO transaction (user_id, symbol, transaction_type, price_per_share, quantity, transaction_amount) VALUES ($id,'$symbol','Sell', $price, $quantity, $transaction_amount);";
    try{
        mysqli_query($con, $delete_query);
        mysqli_query($con, $add_balance_query);
        mysqli_query($con, $transaction_query);
        echo response(true, 'Stocks sold sucessfully !');
        exit;
    }catch(Exception $e){
        echo response(true, 'Sell Failed --!');
        exit;
    }
}else{
    //Reduce Quantity from PORTFOLIO
    $reduce_quantity_query = "UPDATE portfolio SET quantity = quantity - $quantity WHERE user_id = $id AND symbol = '$symbol';";
    //Reduce invested amount from PORTFOLIO
    $avg_price = $row['invested_amount'] / $row['quantity'];
    $reduce_amount = $avg_price * $quantity;
    $reduce_invested_amount_query = "UPDATE portfolio SET invested_amount = invested_amount - $reduce_amount WHERE user_id = $id AND symbol = '$symbol';";
    //Add the balance
    $balance_to_add = $quantity * $price;
    $add_balance_query = "UPDATE user SET balance = balance + $balance_to_add WHERE id = $id;";
    //Add the transaction
    $transaction_amount = $balance_to_add;
    $transaction_query = "INSERT INTO transaction (user_id, symbol, transaction_type, price_per_share, quantity, transaction_amount) VALUES ($id,'$symbol','Sell', $price, $quantity, $transaction_amount);";
    try{
        mysqli_query($con, $reduce_quantity_query);
        mysqli_query($con, $reduce_invested_amount_query);
        mysqli_query($con, $add_balance_query);
        mysqli_query($con, $transaction_query);
        echo response(true, 'Stocks sold sucessfully !');
        exit;
    }catch(Exception $e){
        echo response(true, $e->getMessage());
        exit;
    }
}
?>