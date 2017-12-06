<?php

include('views/templates/header.php');

?>

<section>
	<div>
		<p>N° d'identification : <?php echo $user->getIdNumber(); ?></p>
		<p>Nom, pr&eacute;nom : <?php echo $user->getLastName().' '.$user->getFirstName(); ?></p>
	</div>
	<hr>
	<div>
		<?php if(!empty($user->getBookBorrow())){ ?>
		<p>livre emprunté : <?php echo $user->getBookBorrow(); ?></p>
		<?php }?>
	</div>
</section>

<?php

include('views/templates/footer.php');

?>
