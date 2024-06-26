<?php
session_start();

session_destroy();

 // Remove cookie variables
$days = 30;
setcookie ("rememberme","", time() - ($days * 24 * 60 * 60 * 1000));
session_destroy();
unset($_SESSION['userid']);
header('Location: index.php');

?>