<?php
require '../Model/User_Class.php';
$User = new User();
$User::log_out();
header('Location: ../index.php');
?>
