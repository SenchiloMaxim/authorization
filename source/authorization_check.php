<?php

$authorization_check = 0;

if(isset($_SESSION['login']) && isset($_SESSION['password'])){

	if ( preg_match("/^[a-z0-9]+$/si", $_SESSION['login']) ) {
		$login_check = $_SESSION['login'];
	}
	if ( $_SESSION['password'] <> '' ) {
		$password_check = htmlspecialchars(addslashes(strip_tags($_SESSION['password'])));
	}

	$query = sprintf("SELECT * FROM $users_table where login = '%s' AND password='%s';", $login_check, $password_check);
	$result = mysql_query($query);
    if ( !mysql_error() ) {

		$array_users_info[] = mysql_fetch_array($result);

			$id_user 		= $array_users_info[0]['id'];
			$fio_user 		= $array_users_info[0]['fio'];
			$email_user 	= $array_users_info[0]['email'];
			$login_user 	= $array_users_info[0]['login'];
			
			if($id_user>0){
				$authorization_check = 1;
			}
			else{
				unset($_SESSION['password']);
				unset($_SESSION['login']);
				$authorization_check = 0;
			}
   }

}
