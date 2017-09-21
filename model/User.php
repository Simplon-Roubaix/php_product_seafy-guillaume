<?php
function register($username,$email,$password){
    $pdo = connect();
    $req = $pdo->prepare("INSERT INTO users SET username = ?, email = ?, password = ?, token_confirmed = ?, created_at = NOW(), confirmed= ?");
    //hash password
    $pass = password_hash($password, PASSWORD_BCRYPT);
    //create token for verification
    $token = md5(time() * 5);
    //execute request
    $req->execute([$username, $email, $pass, $token, false]);
    $user_id = $pdo->lastInsertId();
    //send mail
    mail($_POST['email'], "Validation de votre compte", "Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://localhost/php_product_seafy-guillaume/confirm/$user_id/$token");
    setFlash("Un e-mail de confirmation vous a été envoyé pour valider votre compte");
}
function check_user($user){
    $pdo = connect();
    $req = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $req->execute([$user]);
    $user = $req->fetch();
    return $user;
}
function check_email($mail){
    $pdo = connect();
    // verify if isset another identical user
    $req = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $req->execute([$mail]);
    $email = $req->fetch();
    return $email;
}
function check_users($user){
    $pdo = connect();
    $req = $pdo->prepare('SELECT * FROM users WHERE (username = :username OR email = :username) AND confirmed IS NOT NULL');
    $req->execute(['username' => $user]);
    $users = $req->fetch();
    return $users;
}