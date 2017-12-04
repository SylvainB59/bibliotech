<?php

class BooksManager
{
	private $db;

	public function __construct($db)
	{
		// $this->db = $db;
		$this->setDb($db);
	}


	public function getBooks()
	{
		$req = $this->db->query('SELECT b.id, b.author, b.title, b.publicationDate, b.summary, b.borrowBy, t.id, t.typeName type
		                        FROM books b
		                        INNER JOIN types t
		                        ON b.typeId = t.id');
		$data = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $value)
		{
			$books[] = new Book($value);
		}
		return $books;
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
