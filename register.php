<?php
include 'library/includes.php';
session_start();
if (!empty($_POST)) {
    if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
        $errors['username'] = "Votre nom d'utilisateur est incorrect";
    } else {
        $req = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $req->execute([$_POST['username']]);
        $user = $req->fetch();
        if ($user) {
            $errors['username'] = "Ce nom d'utilisateur est déjà utilisé";
        }
    }
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Votre email n'est pas valide";
    } else {
        $req = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $req->execute([$_POST['email']]);
        $email = $req->fetch();
        if ($email) {
            $errors['email'] = "Cette email est déjà utilisé";
        }
    }
    if (empty($_POST['password']) || ($_POST['password'] != $_POST['password_confirm'])) {
        $errors['password'] = "Vous devez rentrer le même mot de passe ";
    }
    if(empty($errors)){

        $req=$pdo->prepare("INSERT INTO users SET username = ?, email = ?, password = ?, token = ?");
        $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
        $token= md5(time()*5);
        $req->execute([$_POST['username'], $_POST['email'], $password, $token]);
        $user_id = $pdo->lastInsertId();

        mail($_POST['email'],"Validation de votre compte","Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://localhost:8888/Comptes/login.php?id=$user_id&token=$token");
        $_SESSION['flash']['success'] ="Un e-mail de confirmation vous a été envoyé pour valider votre compte";
        header('Location: login.php');
        exit();
    }
}
?>
<?php include 'partials/header.php'; ?>
    <h1 class="mt-3">Inscription</h1>
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <p>Vous n'avez pas rempli le formulaire correctement</p>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li>
                    <?= $error; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
    <form method="post" class="mt-3 mb-5">
        <div class="form-group">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Confirmer votre mot de passe</label>
            <input type="password" class="form-control" name="confirm_password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php include 'partials/footer.php'; ?>