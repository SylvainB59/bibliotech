<?php
class UsersManager
{
	private $db;

	public function __construct($db)
	{
		$this->setDb($db);
	}

	public function getUsers()
	{
		$req = $this->db->query('SELECT u.id, u.lastName, u.firstName, u.idNumber, u.idBookBorrow, u.returnDate, b.title bookBorrow
		                        FROM users u
		                        LEFT JOIN books b
		                        ON u.idBookBorrow = b.id');
		$data = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $value)
		{
			$users[] = new User($value);
		}
		return $users;
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
