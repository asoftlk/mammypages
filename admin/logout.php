<?php
session_start();

session_destroy();

 // Remove cookie variables
$days = 30;
setcookie ("rememberme","", time() - ($days * 24 * 60 * 60 * 1000));
setcookie ("password","", time() - ($days * 24 * 60 * 60 * 1000));
session_destroy();
header('Location: login.php');

?>