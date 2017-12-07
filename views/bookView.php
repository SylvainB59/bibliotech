<?php

include('views/templates/header.php');

?>

<section>
	<p>Cat&eacute;gorie : <?php echo $book->getType(); ?></p>
	<h3><?php echo $book->getTitle(); ?></h3>
	<p>By <?php echo $book->getAuthor(); ?> (<?php echo $book->getPublicationDate(); ?>)</p>
	<p class="border"><?php echo $book->getSummary(); ?></p>
	<hr>
	<?php if(!empty($book->getBorrowBy())){?>
	<div>
		<p>Emprunté par le lecteur n° <?php echo $book->getBorrowBy(); ?> .</p>
		<form action="" method="POST">
			<input type="hidden" name="userIdNumber" value="<?php echo $book->getBorrowBy(); ?>">
			<input type="submit" name="userDetail" value="Voir sa fiche">
		</form>
	</div>
	<?php }else{echo '<p>Aucun emprunt</p>';} ?>
</section>

<?php

include('views/templates/footer.php');

?>
