<?php


// var_dump($users);

if(isset($_POST['userDetail']))
{
	if(isset($_POST['userIdNumber']))
	{
		var_dump($_POST);
		$user = $UsersManager->getUserByIdNumber($_POST['userIdNumber']);
	}
	else
	{
		var_dump($_POST);
		$user = $UsersManager->getUserById($_POST['userId']);
	}
	include('views/userView.php');
}
else
{
	$users = $UsersManager->getUsers();
	include('views/usersView.php');
}
