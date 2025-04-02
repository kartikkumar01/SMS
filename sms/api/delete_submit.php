<?php 
session_start();
$id = $_SESSION['user_id'];
include('../include/response_function.php');
?>

<?php 

//Establish the connection with database
include('../include/connect_db.php');

//Fetch the incoming data while validating
if($_POST['username'] == ''){
    echo response(false, 'Please provide username');
    exit;
}else{
    $username = $_POST['username'];
}

if($_POST['password'] == ''){
    echo response(false, 'Please provide password');
    exit;
}else{
    $password = $_POST['password'];
}

//Check if the user exists or not [Identification]
$fetchQuery = "SELECT * FROM user WHERE username = '$username';";
try{
    $table = mysqli_query($con,$fetchQuery);
}catch(Exception $e){
    echo response(false,'Delete Failed !');
    exit;
}
$row = mysqli_fetch_assoc($table);
if(!$row){
    echo response(false,'Wrong username !');
    exit;
}

//Match the password if user exists [Authentication]
if($password != $row['password']){
    echo response(false,'Wrong Password !');
    exit;
}

//Finally delete the account
//delete portfolio
$delete_portfolio = "DELETE FROM portfolio WHERE user_id = $id;";
//delete transaction
$delete_transaction = "DELETE FROM transaction WHERE user_id = $id;";
//delete user
$delete_user = "DELETE FROM user WHERE id = $id;";
try{
   mysqli_query($con,$delete_portfolio);
   mysqli_query($con,$delete_transaction);
   mysqli_query($con,$delete_user);
   session_destroy();
   echo response(true,'Account deleted');
   exit;
}catch(Exception $e){
    echo response(false,"Error while Deleting !!");
    exit;
}
?>