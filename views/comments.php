<?php
session_start();
$title_page = "Comments | " . $blog->url;
?>
<?php include 'partials/header.php'; ?>
    <h1><?= $blog->title; ?></h1>
    <p><?= $blog->content; ?></p>
    <p><?= $blog->date; ?></p>
    <h2>Commentaires</h2>
<?php foreach ($comments as $item): ?>
    <?php if ($item->online == 1): ?>
        <h3><?= $item->name; ?></h3>
        <p><?= $item->comment; ?></p>
        <p><?= $item->date_commentaire; ?></p>
    <?php endif; ?>
<?php endforeach; ?>
    <a href="<?php echo BASE_URL;?>/blog">Revenir</a>
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
        <input type="hidden" name="id" value="<?= $blog->url; ?>">
        <button class="btn btn-primary">Send</button>
    </form>
<?php endif; ?>
<?php include 'partials/footer.php'; ?>