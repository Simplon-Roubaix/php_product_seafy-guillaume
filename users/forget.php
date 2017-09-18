<?php
include '../library/includes.php';
if(!empty($_POST) && !empty($_POST['email'])){
    $req=$pdo->prepare('SELECT * FROM users WHERE email = ? AND confirmed IS NOT NULL');
    $req->execute([$_POST['email']]);
    $user = $req->fetch();
    if($user){
        session_start();
        $reset = md5(time()*5);
        $pdo->prepare('UPDATE users SET reset = ? WHERE id = ?')->execute([$reset, $user->id]);
        setFlash("Les instructions du rappel de mot de passe vous ont été envoyé par e-mail");
        mail($_POST['email'], "Réinitialisation de votre mot de passe", "Afin de réinitialiser votre mot de passe merci de cliquer sur ce lien:\n\nhttp://localhost:8000/users/reset.php?id={$user->id}&token=$reset");
        header('Location: login.php');
        die();
    }else{
        setFlash("Aucun compte ne correspond a cette adresse");
    }
}
?>
<?php require '../partials/header.php'; ?>
    <h1>Mot de passe oublié</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="">E-mail</label>
            <input type="email" name="email" class="form-control"/>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
<?php require '../partials/footer.php'; ?>