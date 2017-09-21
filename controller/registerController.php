<?php
include_once '../model/User.php';
session_start();
if (isset($_SESSION['user'])) {
    setFlash("Vous êtes déjà connecté");
    header('Location: '.BASE_URL);
}
if (!empty($_POST)) {
    //verify entry
    if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
        $errors['username'] = "Votre nom d'utilisateur est incorrect";
    } else {
        $user = check_user($_POST['username']);
        if ($user) {
            $errors['username'] = "Ce nom d'utilisateur est déjà utilisé";
        }
    }
    //verify entry
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Votre email n'est pas valide";
    } else {
        // verify if isset another identical user
        $email = check_email($_POST['email']);
        if ($email) {
            $errors['email'] = "Cette email est déjà utilisé";
        }
    }
    //verify password
    if (empty($_POST['password']) || ($_POST['password'] != $_POST['confirm_password'])) {
        $errors['password'] = "Vous devez rentrer le même mot de passe ";
    }
    if (empty($errors)) {
        register($_POST['username'],$_POST['email'],$_POST['password']);
        setFlash("Un e-mail de confirmation vous a été envoyé pour valider votre compte");
        header('Location: '.BASE_URL.'/login');
        die();
    }
}
require ROOT.'/views/register.php';