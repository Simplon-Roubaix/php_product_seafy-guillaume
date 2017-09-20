<?php
function logged_only()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['admin']) || !isset($_SESSION['user'])) {
        $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'être sur cette page";
        header('Location: login.php');
        exit();
    }
}