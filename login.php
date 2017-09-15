<?php
require_once 'library/includes.php';
if(isset($_SESSION['user'])){
    header('Location: index.php');
    die();
}
if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    $req=$pdo->prepare('SELECT * FROM users WHERE (username = :username OR email = :username) AND confirmed_at IS NOT NULL')->execute(['username' => $_POST['username']]);
    $user = $req->fetch();
    if(password_verify($_POST['password'], $user->password)){
        $_SESSION['auth'] = $user;
        setFlash("Vous êtes maintenant connecté");
        header('Location: index.php');
    }else{
        setFlash("Identifiant ou mot de passe incorrect");
    }
}
?>
<?php require 'partials/header.php'; ?>
    <h1>Se connecter</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="">Pseudo ou e-mail</label>
            <input type="text" name="username" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="">Mot de passe<a href="forget.php">(J'ai oublié mon mot de passe)</a></label>
            <input type="password" name="password" class="form-control"/>
        </div>

        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>

<?php require 'partials/footer.php'; ?>