<?php

include('views/templates/header.php');

?>

<section>
	<form action="" method="POST">
		<label for="type">Trier par : </label>
		<select name="type" id="type">
			<option value="0">Tous</option>
			<?php
			foreach($types as $type)
			{
			?>
			<option value="<?php echo $type['id']; ?>"><?php echo $type['typeName']; ?></option>
			
			<?php
			}
			?>
		</select>
		<input type="submit" name="chooseType" value="OK">
	</form>

	<article>
		<?php 
		foreach($books as $book)
		{
			var_dump($book);
		?>
		<div class="backgroundcolor">
			<h3><?php echo $book->getTitle(); ?></h3>
			<p><?php echo $book->getAuthor(); ?></p>
			<form action="">
				<input type="hidden" name="bookId" value="<?php echo $book->getId(); ?>">
				<input type="submit" name="bookBorrow" value="Emprunt">
			</form>
			<form action="">
				<input type="hidden" name="bookId" value="<?php echo $book->getId(); ?>">
				<input type="submit" name="bookDetail" value="D&eacute;tails">
			</form>
		</div>
		<?php
		}
		?>
	</article>
</section>

<?php

include('views/templates/footer.php');

?>
