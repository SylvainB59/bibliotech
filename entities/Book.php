<?php

class Book
{
	private $id;
	private $type;
	private $author;
	private $title;
	private $publicationDate;
	private $summary;
	private $borrowBy;

	public function __construct(array $data)
	{
		$this->hydrate($data);
	}

	public function hydrate($data)
	{
		foreach($data as $key => $value)
		{
			$method = 'set'.ucfirst($key);
			if(method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}

  /**
   * @return mixed
   */
  public function getId()
  {
      return $this->id;
  }

  /**
   * @return mixed
   */
  public function getType()
  {
      return $this->type;
  }

  /**
   * @return mixed
   */
  public function getAuthor()
  {
      return $this->author;
  }

  /**
   * @return mixed
   */
  public function getTitle()
  {
      return $this->title;
  }

  /**
   * @return mixed
   */
  public function getPublicationDate()
  {
      return $this->publicationDate;
  }

  /**
   * @return mixed
   */
  public function getSummary()
  {
      return $this->summary;
  }

  /**
   * @return mixed
   */
  public function getBorrowBy()
  {
      return $this->borrowBy;
  }

  /**
   * @param mixed $id
   *
   * @return self
   */
  public function setId($id)
  {
      $this->id = $id;

      return $this;
  }

  /**
   * @param mixed $type
   *
   * @return self
   */
  public function setType($type)
  {
      $this->type = $type;

      return $this;
  }

  /**
   * @param mixed $author
   *
   * @return self
   */
  public function setAuthor($author)
  {
      $this->author = $author;

      return $this;
  }

  /**
   * @param mixed $title
   *
   * @return self
   */
  public function setTitle($title)
  {
      $this->title = $title;

      return $this;
  }

  /**
   * @param mixed $publicationDate
   *
   * @return self
   */
  public function setPublicationDate($publicationDate)
  {
      $this->publicationDate = $publicationDate;

      return $this;
  }

  /**
   * @param mixed $summary
   *
   * @return self
   */
  public function setSummary($summary)
  {
      $this->summary = $summary;

      return $this;
  }

  /**
   * @param mixed $borrowBy
   *
   * @return self
   */
  public function setBorrowBy($borrowBy)
  {
      $this->borrowBy = $borrowBy;

      return $this;
  }
}
