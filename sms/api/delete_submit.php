<?php 
session_start();
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
$user_id = $_SESSION['user_id'];
$delete_query = "DELETE FROM user WHERE id = '$user_id'";
try{
   mysqli_query($con,$delete_query);
   session_destroy();
   echo response(true,'User account deleted');
}catch(Exception $e){
    echo response(false,'Delete Failed !');
    exit;
}

?>