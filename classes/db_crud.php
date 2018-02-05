<?php

include_once "db_connect.php";

class DbCrud extends DbConnect {
	
	public function __construct() {
		
		parent::__construct();
	}
	
	public function login($user_email, $password) {
		
		//Prepared statement to help mitigate sqli
		$cursor = $this->connection->prepare("SELECT memberId, isAdmin FROM members WHERE emailAddress = ? AND isDeactivated = 0");
		//Query is passed separately to the parameters and the database is told to treat the paramaters as string
		$cursor->bind_param('s', $user_email);
		//The database escapes chars for me so I dont need to
		$cursor->execute();

        $cursor->bind_result($member_id, $admin);
		$result = $cursor->fetch();
		//mysqli_free_result($result);
		
		$cursor ->free_result();
		
		//var_dump($result);
		//exit(); 
		//TODO Fail properly when username/password doesn't match - FIXED 08/01
		//echo $result;
		$this->username_or_password($result);
		//echo $user_email;
		//exit();
		$cursor = $this->connection->prepare("SELECT `password` FROM `members` WHERE `emailAddress` = ?");
		$cursor->bind_param('s', $user_email);
		$cursor->execute();
		$cursor->bind_result($db_hash);
		$result = $cursor->fetch();
		
		if (!password_verify($password, $db_hash)) {
			$this->username_or_password(False);
        }
		
		if ($admin) {
			session_name("admin");
			session_start();
			$_SESSION['admin'] = True;
			//echo "admin";
		}
		else {
			session_name("user");
			session_start();
			$_SESSION['admin'] = False;
			//echo "user";
		}
		//Go somewhere
		header("location: index.html");

	}
		
		
		
	public function username_or_password($result) {
	
		if (!$result) {
			echo "Username or password incorrect"."<br>";
			exit();
		}
	}	


    public function admin_add_user($user_details) {
		
		//var_dump($user_details);
		//exit();
		
		
		$cursor = $this->connection->prepare("INSERT INTO `members` (`memberId`, `firstName`, `surname`, `phoneNumber`, `houseNumberName`, `streetName`, `city`, `county`, `postcode`, `emailAddress`, `password`, `isAdmin`, `isDeactivated`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '0')");
		$cursor->bind_param('ssssssssssd', $user_details[0], $user_details[1], $user_details[2], $user_details[3], $user_details[4], $user_details[5], $user_details[6], $user_details[7], $user_details[8], $user_details[9], $user_details[10]);
		
		$cursor->execute() or die("Didn't Work");
        //echo "executed";
	}	
	
}

?>