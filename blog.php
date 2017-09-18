<?php
$title_page = "Le blog";
session_start();
include 'library/includes.php';
$bd = $pdo->prepare("SELECT url, title,content, online, comment, DATE_FORMAT(posted_at, '%d/%m/%Y à %Hh%i') AS date, COUNT(IF(online = '1', 1, NULL)) AS nb_coms FROM blog LEFT JOIN comments ON url_blog = blog.url GROUP BY blog_id ORDER BY posted_at DESC");
$bd->execute();
$blogs = $bd->fetchAll();
?>
<?php include 'partials/header.php'; ?>
<h1>Le Blog</h1>
<div class="row">
        <?php foreach ($blogs as $blog): ?>
            <div class="col-md-4">
                <h2><?= $blog->title; ?></h2>
                <p><?= $blog->content; ?></p>
                <p><?= $blog->date; ?></p>
                <p><a class="btn btn-secondary" href="comments.php?url=<?= $blog->url; ?>" role="button">View details &raquo;</a></p>
                <?php if($blog->online == 1): ?>
                <p><?= $blog->nb_coms; ?> Commentaire(s)</p>
                <?php endif; ?>
            </div>
    <?php endforeach; ?>
</div>
<?php include 'partials/footer.php'; ?>
