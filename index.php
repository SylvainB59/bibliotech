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

$BooksManager = new BooksManager($db);
$UsersManager = new UsersManager($db);


// var_dump($_POST);
if(isset($_POST['users']) OR isset($_POST['userDetail']))
{
	include('controllers/users.php');
}
else
{
	include('controllers/index.php');
}

?>
