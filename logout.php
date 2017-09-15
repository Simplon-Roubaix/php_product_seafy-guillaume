<?php
session_start();
unset($_SESSION['user']);
$_SESSION['flash']['success'] = "Vous êtes maintenant déconnecter";
header('Location: login.php');
die();
?>