<?php
include 'library/includes.php';
session_start();
?>



<?php include 'partials/header.php'; ?>
		<div class="row">
		<?php foreach ($db as $key => $value): ?>
			<div class="col-md-4">
				<h2><?php echo $value['title']?></h2>
				<a href="details.php?id=<?php echo $key ;?>"><img src="<?php echo $value['image']?>" class="rounded-circle"></a>
			</div>
			<?php endforeach ?>
		</div>
	</div>
<?php include 'partials/footer.php'; ?>

