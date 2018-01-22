<html>
    <form method="post" action="">
	    Email:    <input name="user_email" type = "text"><br>
		Password: <input name="user_password" type = "password"><br>
		<input name="submit" type="submit" value="Submit"><br>
	</form>


</html>

<?php

//session_start();

include_once "classes/db_crud.php";
include "hash_password.php";

if (isset($_POST["submit"])) {
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	//$user_password = hash_password($user_password);
	//echo $user_password."<br>";
	//exit();
	//echo $user_email."<br>";
	$crud = new DbCrud();
	$result = $crud->login($user_email, $user_password);
	//var_dump($result);
	//echo $result;
}







?>