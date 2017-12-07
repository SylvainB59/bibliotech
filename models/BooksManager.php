<?php

class BooksManager
{
	private $db;

	public function __construct($db)
	{
		$this->setDb($db);
	}

	public function getTypes()
	{
		$req = $this->db->query('SELECT * FROM types');
		$types = $req->fetchAll(PDO::FETCH_ASSOC);
		return $types;
	}

	public function addBook($data)
	{
		$req = $this->db->prepare('INSERT INTO books(typeId, author, title, publicationDate, summary, stock) VALUES (:typeId, :author, :title, :publicationDate, :summary, :stock)');
		$req->execute(array(
			'typeId' => $data->getTypeId(),
			'author' => $data->getAuthor(),
			'title' => $data->getTitle(),
			'publicationDate' => $data->getPublicationDate(),
			'summary' => $data->getSummary(),
			'stock' => $data->getStock()
		));
	}

	public function getBooksBy($typeId)
	{
		$req = $this->db->prepare('SELECT b.id, b.author, b.title, b.publicationDate, b.summary, b.borrowBy, b.stock, t.typeName type
		                        FROM books b
		                        INNER JOIN types t
		                        ON b.typeId = t.id
		                        WHERE b.typeId = :typeId
		                        ORDER BY b.title ASC');
		$req->execute(array('typeId' => $typeId));
		$data = $req->fetchAll(PDO::FETCH_ASSOC);
		// echo '<pre>';
		// var_dump($data);
		// echo '</pre>';
		foreach($data as $value)
		{
			$books[] = new Book($value);
		}
		return $books;
	}

	public function getBooks()
	{
		$req = $this->db->query('SELECT b.id, b.author, b.title, b.publicationDate, b.summary, b.borrowBy, b.stock, t.typeName type
		                        FROM books b
		                        INNER JOIN types t
		                        ON b.typeId = t.id
		                        ORDER BY b.title ASC');
		$data = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $value)
		{
			$books[] = new Book($value);
		}
		return $books;
	}

	public function getBook($id)
	{
		$req = $this->db->prepare('SELECT b.id, b.author, b.title, b.publicationDate, b.summary, b.borrowBy, b.stock, t.typeName type
		                        FROM books b
		                        INNER JOIN types t
		                        ON b.typeId = t.id
		                        WHERE b.id = :id');
		$req->execute(array('id' => $id));
		$data = $req->fetch(PDO::FETCH_ASSOC);
		$book = new Book($data);
		return $book;
	}

	public function bookBorrowed($bookId, $userIdNumber, $stock)
	{
		$req = $this->db->prepare('UPDATE books SET borrowBy = :borrowBy, stock = :newStock WHERE id = :id');
		$req->execute(array(
			'borrowBy' => $userIdNumber,
			'newStock' => $stock,
			'id' => $bookId
		));
	}

	public function bookReturned($bookId, $stock)
	{
		$req = $this->db->prepare('UPDATE books SET borrowBy = :borrowBy, stock = :newStock WHERE id = :id');
		$req->execute(array(
			'borrowBy' => null,
			'newStock' => $stock,
			'id' => $bookId
		));
	}

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param mixed $db
     *
     * @return self
     */
    public function setDb($db)
    {
        $this->db = $db;

        return $this;
    }
}
