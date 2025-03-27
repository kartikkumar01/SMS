<?php include('include/response_function.php'); ?>
<?php 
//Establish the connection with database
include('include/connect_db.php');

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

//Insert the data into the database
$insertQuery = "INSERT INTO user (fullname, username, password, prior_experience) VALUES ('$fullname', '$username', '$password', '$prior_experience')";
try{
    mysqli_query($con, $insertQuery);
    echo response(true,'Signed up sucessfully');
}catch(Exception $e){
    //Exception will only come if duplicate entry is found in database bcz username is unique key
    echo response(false,'User already exists');
    exit;
}
?>