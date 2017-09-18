<?php
$title_page = "Accueil";
include 'library/includes.php';
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




<?php include 'partials/footer.php'; ?> <!-- we add footer to our page -->
