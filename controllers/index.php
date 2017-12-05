<?php

// require('models/BooksManager.php');

$BooksManager = new BooksManager($db);


// echo '<pre>';
// var_dump($books);
// echo '</pre>';
// echo '<pre>';
// var_dump($types);
// echo '</pre>';


if(isset($_POST['validBorrow']))
{
	$book = $BooksManager->getBook($_POST['bookId']);
	$newStock = $book->getStock() - 1;
	$BooksManager->bookBorrowed($book->getId(), $_POST['userIdNumber'], $newStock);
	echo '<p class="info">Emprunt enregistré</p>';
}

if(isset($_POST['bookBorrow']))
{
	$book = $BooksManager->getBook($_POST['bookId']);
	include('views/borrowByView.php');
}
else
{
	$books = $BooksManager->getBooks();
	$types = $BooksManager->getTypes();
// 	echo '<pre>';
// var_dump($books);
// echo '</pre>';
	include('views/indexView.php');
}

?>
