<?php include('../include/response_function.php'); ?>
<?php 
//Establish the connection with database
include('../include/connect_db.php');

//Fetch the incoming data while validating
if($_POST['fullname'] == ''){
    echo response(false, 'Please provide full name');
    exit;
}else if(preg_match('/[^a-zA-Z\s]/', $_POST['fullname'])){
    echo response(false, 'Full name only contain letters');
    exit;
}else{
    $fullname = $_POST['fullname'];
}

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

//It will come mandatory so no need to check
$prior_experience = $_POST['prior_experience'];


//Check for the existing user in the database
$fetchQuery = "SELECT * FROM user WHERE username = '$username'";
try{
    $table = mysqli_query($con,$fetchQuery);
}catch(Exception $e){
    echo response(false,'Signup Failed !');
    exit;
}
$row = mysqli_fetch_assoc($table);
if($row){
    echo response(false,'User already exists !');
    exit;
}


//Insert the user into the database
$insertQuery = "INSERT INTO user (fullname, username, password, prior_experience) VALUES ('$fullname', '$username', '$password', '$prior_experience')";
try{
    mysqli_query($con, $insertQuery);
    echo response(true,'Signed up sucessfully');
}catch(Exception $e){
    echo response(false,'Signup Failed !');
    exit;
}
?>