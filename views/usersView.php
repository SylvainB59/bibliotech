<?php

include('views/templates/header.php');

?>

<section class="row">
	<?php
	foreach($users as $user)
	{
		// echo '<pre>';
		// var_dump($user);
		// echo '</pre>';
	?>
	<div class="col-12 col-md-10 mx-auto row border">
		<p class="col text-center my-auto"><?php echo $user->getIdNumber(); ?></p>
		<p class="col text-center my-auto"><?php echo strtoupper($user->getLastName()).' '.ucfirst($user->getFirstName()); ?></p>
		<form class="col text-center" action="" method="POST">
			<input type="hidden" name="userId" value="<?php echo $user->getId(); ?>">
			<input type="submit" name="userDetail" value="D&eacute;tails">
		</form>
	</div>
	<?php
	}
	?>
</section>

<?php

include('views/templates/footer.php');

?>
