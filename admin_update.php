<html>
    <form method="post" action="">
	    Enter MemberId, this field will not be updated, but is needed to identify the user<br>
		MemberId: <input name ="user_id" type="text"><br>
		
	    Email:    <input name="user_email" type = "text"><br>
		<input name="submit" type="submit" value="Submit"><br>
	</form>
</html>

<?php

include_once "classes/db_crud.php";
//include "hash_password.php";

if (isset($_POST["submit"])) {
	$user_id = $_POST["user_id"];
	$user_new_email = $_POST["user_email"];
	
	//var_dump($user_details);
	$crud = new DbCrud();
	$add_new_user = $crud->admin_update_user_email($user_new_email, $user_id);
}
	


?>