<?php
require ROOT.'/model/User.php';
//start session
session_start();
if(isset($_SESSION['user'])){
    header('Location: '.BASE_URL);
    die();
}
//verify entry
if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    $user = check_users($_POST['username']);
    if($user->confirmed == true) {
        if (password_verify($_POST['password'], $user->password)) {
            $_SESSION['user'] = $user;
            setFlash("Vous êtes maintenant connecté");
            header('Location: '.BASE_URL);
        } else {
            setFlash("Identifiant ou mot de passe incorrect");
        }
    } else {
        setFlash("Vous n'avez pas confirmé votre compte");
    }
}
require ROOT.'/views/login.php';