<?php

abstract class Model {
	protected $dbh;
	protected $stmt;

	private $host = 'localhost';
	private $dbname = 'shareboard';
	private $user = 'root';
	private $password = '';

	public function __construct () {
		$this->dbh = new PDO ("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->password);
	}

	public function query ($query) {
		$this->stmt = $this->dbh->prepare ($query);
	}

	public function bind ($param, $value, $type = null) {
		if (is_null($type)) {
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;

				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;	

				default:
					$type = PDO::PARAM_STR;
					break;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute () {
		$this->stmt->execute ();
	}

	public function fetchAll () {
		$this->execute ();
		return $this->stmt->fetchAll (PDO::FETCH_ASSOC);
	}

	public function lastInsertId () {
		return $this->dbh->lastInsertId ();
	}

	public function fetchSingle () {
		$this->execute ();
		return $this->stmt->fetch (PDO::FETCH_ASSOC);
	}
}