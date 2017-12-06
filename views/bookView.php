<?php

include('views/templates/header.php');

?>

<section>
	<p>Cat&eacute;gorie : <?php echo $book->getType(); ?></p>
	<h3><?php echo $book->getTitle(); ?></h3>
	<p>By <?php echo $book->getAuthor(); ?> (<?php echo $book->getPublicationDate(); ?>)</p>
	<p class="border"><?php echo $book->getSummary(); ?></p>
	<hr>
	<div>
		<p>Emprunté par lecteur n° <?php if($book->getBorrowBy() !== null){echo $book->getBorrowBy();}else{echo 'X';} ?></p>
		<form action="" method="POST">
			<input type="hidden" name="userIdNumber">
			<input type="submit" name="userDetail" value="Voir sa fiche">
		</form>
	</div>
</section>

<?php

include('views/templates/footer.php');

?>
