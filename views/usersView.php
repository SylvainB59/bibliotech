<?php

include('views/templates/header.php');

?>

<section>
	<?php
	foreach($users as $user)
	{
		// echo '<pre>';
		// var_dump($user);
		// echo '</pre>';
	?>
	<div>
		<p><?php echo $user->getIdNumber(); ?></p>
		<p><?php echo $user->getLastName().' '.$user->getLastName(); ?></p>
		<form action="" method="POST">
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
