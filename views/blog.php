<?php
$title_page = "Le blog";
session_start();
print_r($url);
?>

<?php include 'partials/header.php'; ?>
<h1>Le Blog</h1>
<div class="row">
    <?php foreach ($blogi as $blog): ?>
        <div class="col-md-4">
            <h2><?= $blog->title; ?></h2>
            <p><?= $blog->content; ?></p>
            <p><?= $blog->date; ?></p>
            <p><a class="btn btn-secondary" href="view/<?= $blog->url; ?>" role="button">View details &raquo;</a></p>
            <?php if($blog->online == 1): ?>
                <p><?= $blog->nb_coms; ?> Commentaire(s)</p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'partials/footer.php'; ?>
