<?php

include('views/templates/header.php');

?>

<section>
	<p>Emprunt de <strong><?php echo $book->getTitle(); ?></strong> par :</p>
	<form action="" method="POST">
		<label for="userIdNumber">N° d'identification</label>
		<input type="hidden" name="bookId" value="<?php echo $book->getId();?>">
		<input type="text" name="userIdNumber" id="userIdNumber">
		<input type="submit" name="validBorrow" value="Valider">
	</form>
</section>

<?php

include('views/templates/footer.php');

?>
