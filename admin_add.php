<html>
    <form method="post" action="">
	    Email:    <input name="user_email" type = "text"><br>
		Password: <input name="user_password" type = "password"><br>
		First Name: <input name="first_name" type = "text"><br>
		Surname: <input name="surname" type = "text"><br>
		Phone Number: <input name="phone_no" type = "text"><br>
		House address/name: <input name="house_number_name" type = "text"><br>
		Street Name: <input name="street_name" type = "text"><br>
		City: <input name="city" type = "text"><br>
		County: <input name="county" type = "text"><br>
		Postcode: <input name="postcode" type = "text"><br>
		Admin User?: <input name="isAdmin" type = "checkbox"><br>
		<input name="submit" type="submit" value="Submit"><br>
	</form>

</html>


<?php 

//session_start();

include_once "classes/db_crud.php";
//include "hash_password.php";

if (isset($_POST["submit"])) {
	$user_details = array();
	$user_details[] = $_POST["first_name"];
	$user_details[] = $_POST["surname"];
	$user_details[] = $_POST["phone_no"];
	$user_details[] = $_POST["house_number_name"];
	$user_details[] = $_POST["street_name"];
	$user_details[] = $_POST["city"];
	$user_details[] = $_POST["county"];
	$user_details[] = $_POST["postcode"];
	$user_details[] = $_POST["user_email"];
	$user_details[] = $_POST["user_password"];
	$user_details[] = $_POST["isAdmin"];
	$crud = new DbCrud();
	$add_new_user = $crud->admin_add_user($user_details);
}
	
	
?>
