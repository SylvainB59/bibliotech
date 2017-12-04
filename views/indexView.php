<?php

include('views/templates/header.php');

?>

<section>
	<form action="" method="POST">
		<select name="type" id="type">
			<option value="0">Tous</option>
			<option value="1">Fantastique</option>
			<option value="2">Polar</option>
			<option value="3">Roman</option>
		</select>
		<input type="submit" name="chooseType" value="OK">
	</form>

	<article>
		<?php 
		foreach($books as $book)
		{
		?>
		<div class="backgroundcolor">
			<h3><?php echo $book->getTitle(); ?></h3>
			<p><?php echo $book->getAuthor(); ?></p>
			<form action="">
				<input type="submit" name="bookBorrow" value="Emprunt">
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
