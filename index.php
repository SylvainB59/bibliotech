<?php

function loadClass($class)
{
	if($class == 'BooksManager' OR $class == 'UsersManager')
	{
		require 'models/'.$class.'.php';
	}
	else
	{
		require 'entities/'. $class .'.php';
	}
}

spl_autoload_register('loadClass');

require('models/dbConnect.php');

// var_dump($_POST);
if(isset($_POST['users']))
{
	include('controllers/users.php');
}
else
{
	include('controllers/index.php');
}

?>
