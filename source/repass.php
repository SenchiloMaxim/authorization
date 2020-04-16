<?php

if(isset($_POST['refresh_profile'])){

	$password 	= trim($_POST["password"]);
	$repassword = trim($_POST["repassword"]);
	
	$error 		= '';
		
	
	if ( $password=='' || $repassword==''){
		$error .= '<li>Поле Пароль должно быть заполнено</li>';
	}
	if ( $password!=$repassword ){
		$error .= '<li>Пароли не совпадают</li>';
	}
	if ( (mb_strlen($password, 'UTF-8')<6 || mb_strlen($repassword, 'UTF-8')<6) && $password<>'' ){
		$error .= "<li>Пароль должен содержать минимум 6 символов</li>";
	}

	

	if( $error == '' ){
			$query_refresh = sprintf("UPDATE $users_table SET password='%s' WHERE id='%d';", md5($password), $id_user);
			mysql_query($query_refresh);
			
			if(!mysql_error()){
				$inner_header_meta = '<meta http-equiv="refresh" content="0; url=index.php?authorization" />';	
			}
			else{
				echo mysql_error();
			}
		}
	}	
