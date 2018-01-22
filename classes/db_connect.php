<?php

class DbConnect {
	
	private $_host = "localhost";
	private $_username = "root";
	private $_password = "";
	private $_database = "ISAD151";
	
	protected $connection;
	
	public function __construct() {
		
		if (!isset($this->connection)) {
			$this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
		}
		if ($this->connection->connect_errno) {
			//echo ("Connect failed: ". $this->connection->connect_error);
			die("Connection failed" . $this->connection->connect_error);
			//exit();
		}
		
		return $this->connection;
    }
}

?>