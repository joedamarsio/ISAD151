<html>
    <form method="post" action="">
	    Enter the email address of the user you want to delete: <input name="user_email" type = "text"><br>
		<input name="submit" type="submit" value="Submit"><br>
	</form>
</html>

<?php

include_once "classes/db_crud.php";

if (isset($_POST["submit"])) {
	$user_to_delete = $_POST["user_email"];
	$crud = new DbCrud();
	$delete_users = $crud->admin_delete_user($user_to_delete);
}

?>