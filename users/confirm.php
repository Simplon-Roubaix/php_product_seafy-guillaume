<?php
$user_id = $_GET['id'];
$token = $_GET['token'];
require '../library/includes.php';
//prepare table for verify token
$req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$req->execute([$user_id]);
$user = $req->fetch();
//start session
session_start();
if ($user && $user->token_confirmed == $token) {
    //prepare table for update
    $pdo->prepare('UPDATE users SET token_confirmed = NULL, created_at = NOW(), confirmed = ? WHERE id=?')->execute([true, $user_id]);
    //define session user
    $_SESSION['user'] = $user;
    setFlash("Votre compte a bien été validé");
    header('Location: login.php');
    die();
} else {
    setFlash("Vous n'êtes pas un utilisateur enregisté", 'danger');
    header('Location: register.php');
    die();
}
?>