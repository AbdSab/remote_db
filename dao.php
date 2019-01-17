<?php

class Dao {

	private $username;
	private $password;
	private $host;
	private $database;
	private $connection;

	public $error;

	public function __construct($host, $username, $password, $database){
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;

		$this->connection = new mysqli($host, $username, $password, $database);
		$this->error = $this->connection->connect_error;
	}
	
	public function query($sql){
		return $this->connection->query($sql);
	}
	
}
