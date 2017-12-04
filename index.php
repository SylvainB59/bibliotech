<?php

function loadClass($class)
{
	require 'entities/'. $class .'.php';
}

spl_autoload_register('loadClass');

require('models/dbConnect.php');

// var_dump($_POST);

include('controllers/index.php');

?>
