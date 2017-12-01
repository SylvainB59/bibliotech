<?php

class BooksManager
{
	private $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function getBooks()
	{
		$req = $this->db->query('SELECT * FROM books');
		$data = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $value)
		{
			$books.= new Book($value);
		}
		return $books;
	}
}
