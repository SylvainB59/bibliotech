<?php

// require('models/BooksManager.php');



// echo '<pre>';
// var_dump($books);
// echo '</pre>';
// echo '<pre>';
// var_dump($types);
// echo '</pre>';


if(isset($_POST['validBorrow']))
{
	$user = $UsersManager->getUserByIdNumber($_POST['userIdNumber']);
	if($user == false)
	{
		echo '<p class="erreur">Aucun utilisateur enregistré à ce numéro</p>';
	}
	else
	{
		$book = $BooksManager->getBook($_POST['bookId']);
		if($book->getStock() < 1)
		{
			echo '<p class="erreur">Plus de stock</p>';
		}
		else
		{
			$newStock = $book->getStock() - 1;
			$BooksManager->bookBorrowed($book->getId(), $user->getIdNumber(), $newStock);
			$UsersManager->bookBorrowed($book->getId(), $user->getId());
			echo '<p class="valid">Emprunt enregistré</p>';
		}
	}

}

if(isset($_POST['bookBorrow']))
{
	$book = $BooksManager->getBook($_POST['bookId']);
	include('views/borrowByView.php');
}
elseif(isset($_POST['bookDetail']))
{
	$book = $BooksManager->getBook($_POST['bookId']);
	include('views/bookView.php');
}
else
{
	$books = $BooksManager->getBooks();
	$types = $BooksManager->getTypes();
	include('views/indexView.php');
}

?>
