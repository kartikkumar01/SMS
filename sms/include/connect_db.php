<?php
//Establishing connection with the database
$host = '127.0.0.1'; //localhost ip address (means mysql is hosted locally at this ip or domain)
$username = 'root'; //mysql username
$password = ''; //mysql password
$dbname = 'sms'; //database inside mysql
try{
    $con = mysqli_connect($host, $username, $password, $dbname);
}catch(Exception $e){
    //my created function which creates array and converts it into JSON
    echo response(false,'Some Error Occured !');
    exit;
}
?>