<?php
function response($status, $message){
    $array_response = array(
        "status" => $status,
        "message" => "$message"
    );
    $json_response = json_encode($array_response);
    return $json_response;
}
?>