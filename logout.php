<?php
require_once("./class/init.php");
$session = $init->getSession();
$redirect = $init->getRedirect();
$username=$session->__get("username");
$session->__unset('username');
$redirect->redirect('home.php');
?>
