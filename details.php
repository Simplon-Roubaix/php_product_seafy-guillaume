
<?php include "db/db.php"; /*we add array where are our elements*/
include "partials/header.php"  /*we add header to our page*/
?>

<!-- displays each title of each key -->
<h2 class="text-center text-warning"><?php echo $db[$_GET['id']]['title']; ?></h2> 


<!-- displays each image and text content of each key -->
<section class="d-flex space-between">
	<img src="<?php echo $db[$_GET['id']]['image']; ?>" class="sizeCars rounded-circle mx-5 my-5">
	<p class="my-5"><?php echo $db[$_GET['id']]['content']; ?></p>
</section>

<!-- element for comingBack page before -->
<a href="index.php"><img src="img/return.png"  class="mx-auto d-block"></a>

	 


<?php include "partials/footer.php";?> <!-- we add footer to our page -->