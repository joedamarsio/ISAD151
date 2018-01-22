<?php

//hash_password("password");

function hash_password($user_password) {
	
	$user_hash = password_hash($user_password, PASSWORD_DEFAULT);
	//echo $user_hash;
	return $user_hash;
	
}
	
//echo (hash_password("password"));
	

?>