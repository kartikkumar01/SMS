<?php
session_start();
include('../include/response_function.php');
session_destroy();
echo response(true,'Session destroyed');
?>