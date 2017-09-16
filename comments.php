<?php
include 'library/includes.php';
session_start();
$id = $_GET['id'];
$db = $pdo->prepare("SELECT id, title,content, url, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%i') AS date FROM blog WHERE id=?");
$bdd = $pdo->prepare("SELECT id, blog_id,name, online, content, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%i') AS date_commentaire FROM comments WHERE blog_id=?");
$db->execute([$id]);
$bdd->execute([$id]);
$blog = $db->fetch();
$comments = $bdd->fetchAll();
$title_page = "Comments | " . $blog->url;
?>
<?php include 'partials/header.php'; ?>
    <h1><?= $blog->title; ?></h1>
    <p><?= $blog->content; ?></p>
    <p><?= $blog->date; ?></p>
    <?php foreach ($comments as $item): ?>
    <?php if ($item->online == 1): ?>
        <h2><?= $item->name; ?></h2>
        <p><?= $item->content; ?></p>
        <p><?= $item->date_commentaire; ?></p>
    <?php endif; ?>
<?php endforeach; ?>
    <a href="/">Revenir</a>
<?php if (isset($_SESSION['user'])): ?>
    <h3>Ajouter un commentaire</h3>
    <form action="users/comment_post.php" method="post">
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea class="form-control" id="content" name="content"></textarea>
        </div>
        <div class="form-group">
            <label for="autor">Auteur</label>
            <input type="text" class="form-control" id="autor" name="autor">
        </div>
        <input type="hidden" name="id" value="<?= $blog->id; ?>">
        <button class="btn btn-primary">Send</button>
    </form>
<?php endif; ?>
<?php include 'partials/footer.php'; ?>