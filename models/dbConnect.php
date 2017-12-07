<?php

try
{
	$db = new PDO('mysql:host=localhost;dbname=bibliotech;charset=utf8', 'root', 'Neosyl59' , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) 
{
	die('Erreur : ' . $e->getMessage());
}

?>
