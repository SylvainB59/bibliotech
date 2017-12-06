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
		$req = $this->db->query('SELECT * FROM users ORDER BY lastName ASC');
		$data = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $value)
		{
			$users[] = new User($value);
		}
		return $users;
	}

	public function getUserById($userId)
	{
		$req = $this->db->prepare('SELECT u.id, u.lastName, u.firstName, u.idNumber, u.idBookBorrow, u.returnDate, b.title bookBorrow
		                        FROM users u
		                        LEFT JOIN books b
		                        ON u.idBookBorrow = b.id
		                        WHERE u.id = :userId');
		$req->execute(array('userId' => $userId));
		$data = $req->fetch(PDO::FETCH_ASSOC);
		$user = new User($data);
		return $user;
	}

	public function getUserByIdNumber($userIdNumber)
	{
		$req = $this->db->prepare('SELECT u.id, u.lastName, u.firstName, u.idNumber, u.idBookBorrow, u.returnDate, b.title bookBorrow
		                        FROM users u
		                        LEFT JOIN books b
		                        ON u.idBookBorrow = b.id
		                        WHERE u.idNumber = :userIdNumber');
		$req->execute(array('userIdNumber' => $userIdNumber));
		$data = $req->fetch(PDO::FETCH_ASSOC);
		if($data == false)
		{
			return $data;
		}
		else
		{
			$user = new User($data);
			return $user;
		}
	}

	public function bookBorrowed($bookId, $userId)
	{
		$req = $this->db->prepare('UPDATE users SET idBookBorrow = :idBookBorrow WHERE id = :id');
		$req->execute(array(
			'idBookBorrow' => $bookId,
			'id' => $userId
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
