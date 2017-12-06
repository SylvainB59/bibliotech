<?php


// var_dump($users);

if(isset($_POST['userDetail']))
{
	if(isset($_POST['userIdNumber']))
	{
		$user = $UsersManager->getUserByIdNumber($_POST['userIdNumber']);
	}
	else
	{
		$user = $UsersManager->getUserById($_POST['userId']);
	}
	include('views/userView.php');
}
else
{
	$users = $UsersManager->getUsers();
	include('views/usersView.php');
}
