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
		<div class="backgroundcolor">
			<h3>TITRE LIVRE</h3>
			<p>auteur</p>
			<form action="">
				<input type="submit" name="bookDetail" value="D&eacute;tails">
				<input type="submit" name="bookBorrow" value="Emprunt">
			</form>
		</div>
	</article>
</section>

<?php

include('views/templates/footer.php');

?>
