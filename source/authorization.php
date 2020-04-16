<?php


if(isset($_POST["authorization"])){


	$login = trim($_POST["login"]);
	$password = trim($_POST["password"]);
	$error = '';
	


	if (!preg_match("/^[a-z0-9]+$/si", $login)) {
		$error .= "<li>Логин должен содержать только латинские буквы и цифры</li>";
	}
	if(mb_strlen($login, 'UTF-8')<6){
		$error .= "<li>Логин должен содержать минимум 6 символов</li>";
	}
	if (!preg_match("/[A-Za-z0-9]/", $password)) {
		$error .= "<li>Пароль должен содержать минимум 6 символов</li>";
	}
	

	if($error==''){
		
		$md5_password = md5($password);
	
		$query = sprintf("SELECT id FROM $users_table WHERE login = '%s' AND password = '%s' ;", $login, $md5_password);
		$result = mysql_query($query);
		if(!mysql_error()){
		
			$quantity = mysql_num_rows($result);

			if($quantity>0){
				
				$_SESSION['password'] = $md5_password;
				$_SESSION['login'] = $login;

				$inner_header_meta = '<meta http-equiv="refresh" content="0; url=index.php" />';
				$successfully = '<li>Вы успешно авторизованы. Если страница не перезагрузилась автоматически, <a href="index.php">нажмите сюда</a></li>';
				
			}
			else{
				$error = '<li>Не верно указан логин или пароль</li>';
			}
			
		}
		else{
			echo mysql_error();
		}
	}

}
