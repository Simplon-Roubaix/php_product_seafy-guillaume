<<<<<<< HEAD
<?php
include 'library/includes.php';
=======
<?php 
include 'partials/header.php'; /*we add header to our page*/
include 'db/db.php'; /*we add array where are our elements*/

>>>>>>> duo
?>



<?php include 'partials/header.php'; ?>
		<div class="row">
		<!-- loop foreach for find "DB" and "key" & "value" of elements!  -->
		<?php foreach ($db as $key => $value): ?>
			<div class="index0 col-md-4 ">
				<h2><?php echo $value['title']?></h2>  <!-- find the title and display -->
				<a href="details.php?id=<?php echo $key ;?>">  <!-- displays the page where it is located id of array -->
				<img src="<?php echo $value['image']?>" class="theCars rounded-circle"></a> <!-- display every picture of every $key -->
			</div>
			<?php endforeach ?>
		</div>
	</div>
<<<<<<< HEAD
<?php include 'partials/footer.php'; ?>
=======




<?php include 'partials/footer.php'; ?> <!-- we add footer to our page -->
>>>>>>> duo

