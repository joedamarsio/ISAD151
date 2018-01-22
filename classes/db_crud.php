<?php

include_once "db_connect.php";

class DbCrud extends DbConnect {
	
	public function __construct() {
		
		parent::__construct();
	}
	
	public function login($user_email, $password) {
		
		//Prepared statement to help mitigate sqli
		$cursor = $this->connection->prepare("SELECT memberId, isAdmin FROM members WHERE emailAddress = ? AND password = ?");
		//Query is passed separately to the parameters and the database is told to treat the paramaters as string
		$cursor->bind_param('ss', $user_email, $password);
		//The database escapes chars for me so I dont need to
		$cursor->execute();

        $cursor->bind_result($member_id, $admin);
		$result = $cursor->fetch();
		//var_dump($result);
		//exit(); 
		//TODO Fail properly when username/password doesn't match - FIXED 08/01
		//echo $result;
		if (!$result) {
			echo "Username or password incorrect"."<br>";
			return false;
		}
		if ($admin) {
			session_name("admin");
			session_start();
			$_SESSION['admin'] = True;
			echo "admin";
		}
		else {
			session_name("user");
			session_start();
			$_SESSION['admin'] = False;
			echo "user";
		}
		//$this->read();
		
	}
		
	
	public function read() {
		
		$result = $this->connection->query("SELECT team_name FROM football_teams");
		// TODO Make this work 08/01
		if (!$result) {
			echo "No data"."<br>";
			return false;
		}
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;

	}
	
}

?>