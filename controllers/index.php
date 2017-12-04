<?php

require('models/BooksManager.php');

$BooksManager = new BooksManager($db);

$books = $BooksManager->getBooks();
$types = $BooksManager->getTypes();
// echo '<pre>';
// var_dump($books);
// echo '</pre>';
// echo '<pre>';
// var_dump($types);
// echo '</pre>';

include('views/indexView.php');

?>
