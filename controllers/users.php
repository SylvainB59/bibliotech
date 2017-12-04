<?php

$UsersManager = new UsersManager($db);

$users = $UsersManager->getUsers();
// var_dump($users);


include('views/usersView.php');
