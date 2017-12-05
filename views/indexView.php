<?php

include('views/templates/header.php');

?>

<section>
	<div class="row justify-content-center">
		<form class="" action="" method="POST">
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
	</div>

	<article class="row">
		<?php 
		foreach($books as $book)
		{
			// var_dump($book);
		?>
		<div class="col-12 col-md-10 row justify-content-between mx-auto border 
		<?php if($book->getStock() > 0){echo 'available';}else{echo 'borrow';} ?>">
			<p class="col-12"><strong><?php echo $book->getTitle(); ?></strong></p>
			<p class="col-6 col-md"><?php echo $book->getAuthor(); ?></p>
			<p class="col-6 col-md"><?php echo $book->getType(); ?></p>
			<p class="col-6 col-md">Stock : <?php echo $book->getStock(); ?></p>
			<div class="col-12 col-md">
				<form class="row" action="" method="POST">
					<input type="hidden" name="bookId" value="<?php echo $book->getId(); ?>">
					<?php if($book->getStock() > 0){?>
					<input class="col-6 col-md" type="submit" name="bookBorrow" value="Emprunt">
					<?php }else{ ?>
					<input class="col-6 col-md" type="submit" name="bookreturn" value="Retour">
					<?php } ?>
					<input class="col-6 col-md" type="submit" name="bookDetail" value="D&eacute;tails">
				</form>
			</div>
		</div>
		<?php
		}
		?>
	</article>
</section>

<?php

include('views/templates/footer.php');

?>
