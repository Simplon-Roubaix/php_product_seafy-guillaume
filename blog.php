<?php
$title_page = "Le blog";
session_start();
include 'library/includes.php';
$bd = $pdo->prepare("SELECT id, title,content, url, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%i') AS date FROM blog ORDER BY id DESC");
$bd->execute();
$blogs = $bd->fetchAll();
?>
<?php include 'partials/header.php'; ?>
<h1>Le Blog</h1>
<div class="row">
<?php foreach($blogs as $blog): ?>

    <div class="col-md-4">
        <h2><?= $blog->title; ?></h2>
        <p><?= $blog->content; ?></p>
        <p><?= $blog->date; ?></p>
        <p><a class="btn btn-secondary" href="comments.php?id=<?=$blog->id;?>" role="button">View details &raquo;</a></p>
    </div>

<?php endforeach; ?>
</div>
<?php include 'partials/footer.php'; ?>
