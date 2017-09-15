
<?php include "library/db.php";
include "partials/header.php"
?>


<h2 class="text-center text-warning"><?php echo $db[$_GET['id']]['title']; ?></h2>

<section class="d-flex space-between">
	<img src="<?php echo $db[$_GET['id']]['image']; ?>" class="sizeCars rounded-circle mx-5 my-5">
	<p><?php echo $db[$_GET['id']]['content']; ?></p>
</section>


<?php include "partials/footer.php";?>