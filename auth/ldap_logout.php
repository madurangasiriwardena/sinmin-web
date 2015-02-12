<?php


$protocol = 'http://';

session_start();
$root_uri = $protocol . $_SERVER['HTTP_HOST'].'/sinmin-web/';
unset($_SESSION['username']);
unset($_SESSION['logout']);
unset($_SESSION['auth_type']);
unset($_SESSION['access_token']);

$root_uri = $protocol . $_SERVER['HTTP_HOST'].'/sinmin-web/login.php';
header('Location: '.$root_uri);

?>