<?php

//hash_password("password");

function hash_password($user_password) {
	
	$user_hash = password_hash($user_password, PASSWORD_DEFAULT);
	//echo $user_hash;
	return $user_hash;
	
}
	
//echo (hash_password("password"));

$password_string = "password";
  $password_hash = "$2y$10$.b8F0ISJ19NCcDjnq843HOXw8jjS.4hUem4jznVXf7JzvZjuE8.Ze";

  if (password_verify($password_string, $password_hash)) {
    echo "Yes";
  } else {
    echo "no";
  }
	

?>