<?php

function loadClass($class)
{
	require 'entities/'. $class .'.php';
}

spl_autoload_register('loadClass')

var_dump($_POST);

include('controllers/index.php');

?>
