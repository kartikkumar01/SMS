<?php 
session_start();
//creates the new session or fetch the existing session
//session are destroyed when user closes the browser or logs out
//To check login , check session variable
//To destory session user session_destroy()
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
$fetchQuery = "SELECT * FROM user WHERE username = '$username'";
try{
    $table = mysqli_query($con,$fetchQuery);
}catch(Exception $e){
    echo response(false,'Login Failed !');
    exit;
}
$row = mysqli_fetch_assoc($table);
if(!$row){
    echo response(false,'User do not exists !');
    exit;
}

//Match the password if user exists [Authentication]
if($password != $row['password']){
    echo response(false,'Wrong Password !');
    exit;
}

//Store data in session variable
$_SESSION['user_id'] = $row['id'];

echo response(true,'Logged in');
?>