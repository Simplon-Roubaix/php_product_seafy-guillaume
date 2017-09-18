<?php
include '../library/includes.php';
if (isset($_GET['id']) && isset($_GET['token'])) {
    $req = $pdo->prepare('SELECT * FROM users WHERE id = ? AND reset = ?');
    $req->execute([$_GET['id'], $_GET['token']]);
    $user = $req->fetch();
    if ($user) {
        if (!empty($_POST)) {
            if (!empty($_POST['password']) && $_POST['password'] == $_POST['password_confirm']) {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $pdo->prepare('UPDATE users SET password = ?, reset = NULL')->execute([$password]);
                session_start();
                setFlash("Votre mot de passe a bien été modifié");
                $_SESSION['auth'] = $user;
                header('Location: ../index.php');
                die();
            }
        }
    } else {
        session_start();
        setFlash("Ce lien n'est plus valide");
        die();
    }
} else {
    header('Location: login.php');
    die();
}
?>
<?php require '../partials/header.php'; ?>
    <h1>Réinitialiser mon mot de passe</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="">Mot de passe</label>
            <input type="password" name="password" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Confirmation du mot de passe</label>
            <input type="password" name="password_confirm" class="form-control"/>
        </div>
        <button type="submit" class="btn btn-primary">Réinitialiser mon mot de passe</button>
    </form>
<?php require '../partials/footer.php'; ?>