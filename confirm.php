<?php
$user_id=$_GET['id'];
$token=$_GET['token'];
require 'library/includes.php';
$req=$pdo->prepare('SELECT * FROM users WHERE id = ?');
$req->execute([$user_id]);
$user=$req->fetch();
session_start();
if($user && $user->confirmation_token == $token){

    $pdo->prepare('UPDATE users SET token_confirmed = NULL, created_at = NOW() WHERE id=?')->execute([$user_id]);
    setFlash("Votre compte a bien été validé");
    $_SESSION['user']=$user;
    header('Location: index.php');
    die();
} else {
    setFlash("Vous n'êtes pas un utilisateur enregisté",'danger');
    header('Location: register.php');
    die();
}


?>