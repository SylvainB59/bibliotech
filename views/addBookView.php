<?php

include('views/templates/header.php');

?>

<section class="row">
	<form class="row col-12" action="" method="POST">
		<div class="row col-12 col-md-6 text-center">
			<!-- <p> -->
				<label class="col-12 col-md-6" for="typeId">Cat&eacute;gorie : </label>
				<select class="col-12 col-md-6" name="typeId" id="typeId">
					<option value="" selected disabled>Cat&eacute;gorie</option>
					<?php
					foreach($types as $type)
					{
					?>
					<option value="<?php echo $type['id']; ?>"><?php echo $type['typeName']; ?></option>
					<?php
					}
					?>
				</select>
			<!-- </p> -->
			<!-- <p> -->
				<label class="col-12 col-md-6" for="author">Auteur : </label>
				<input class="col-12 col-md-6" type="text" name="author" id="author">
			<!-- </p> -->
			<!-- <p> -->
				<label class="col-12 col-md-6" for="title">Titre : </label>
				<input class="col-12 col-md-6" type="text" name="title" id="title">
			<!-- </p> -->
			<!-- <p> -->
				<label class="col-12 col-md-6" for="publicationDate">Ann&eacute;e de publication : </label>
				<input class="col-12 col-md-6" type="text" name="publicationDate" id="publicationDate">
			<!-- </p> -->
		</div>
		<div class="row col-12 col-md-6">
			<textarea class="col-12 col-md-10 col-lg-6 mx-auto" name="summary" id="summary" cols="30" rows="10" placeholder="R&eacute;sum&eacute du livre..."></textarea>
		</div>
		<input class="mx-auto mt-2" type="submit" name="validAddBook" value="Ajouter">
	</form>
</section>

<?php

include('views/templates/footer.php');

?>
