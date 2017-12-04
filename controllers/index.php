<?php

require('models/BooksManager.php');

$BooksManager = new BooksManager($db);

$books = $BooksManager->getBooks();
// echo '<pre>';
// var_dump($books);
// echo '</pre>';

include('views/indexView.php');

?>
