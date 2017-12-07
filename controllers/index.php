<?php

// require('models/BooksManager.php');



// echo '<pre>';
// var_dump($books);
// echo '</pre>';
// echo '<pre>';
// var_dump($types);
// echo '</pre>';


if(isset($_POST['validAddBook']))
{
	$newBook = new Book($_POST);
	$BooksManager->addBook($newBook);
	echo '<p class="valid">Le livre "'.$newBook->getTitle().'" est bien enregistré</p>';
}

if(isset($_POST['bookReturn']))
{
	$book = $BooksManager->getBook($_POST['bookId']);
	$user = $UsersManager->getUserByIdNumber($book->getBorrowBy());

	$newStock = (int)$book->getStock() + 1;
	$BooksManager->bookReturned($book->getId(), $newStock);
	$UsersManager->bookReturned($user->getId());
	echo '<p class="valid">L\'utilisateur N° '.$user->getIdNumber().' a bien rendu le livre "'.$book->getTitle().'"</p>';
}

if(isset($_POST['validBorrow']))
{
	$userIdNumber = strip_tags($_POST['userIdNumber']);
	$user = $UsersManager->getUserByIdNumber($userIdNumber);
	if($user == false)
	{
		echo '<p class="erreur">Aucun utilisateur enregistré à ce numéro</p>';
	}
	elseif(!empty($user->getBookBorrow()))
	{
		echo '<p class="erreur">Cet utilisateur n \'a pas encore rendu son dernier livre!</p>';
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

if(isset($_POST['bookDetail']))
{
	$book = $BooksManager->getBook($_POST['bookId']);
	include('views/bookView.php');
}
elseif(isset($_POST['addBook']))
{
	$types = $BooksManager->getTypes();
	include('views/addBookView.php');
}
elseif(isset($_POST['bookBorrow']))
{
	$book = $BooksManager->getBook($_POST['bookId']);
	include('views/borrowByView.php');
}
else
{
	if(isset($_POST['chooseType']) AND $_POST['type'] != 0)
	{
		$books = $BooksManager->getBooksBy($_POST['type']);
	}
	else
	{
		$books = $BooksManager->getBooks();
	}
	$types = $BooksManager->getTypes();
	include('views/indexView.php');
}

?>
