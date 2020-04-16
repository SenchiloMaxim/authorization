<?php

if(isset($_POST['registration'])){

	$login 		= trim($_POST["login"]);
	$password 	= trim($_POST["password"]);
	$repassword = trim($_POST["repassword"]);
	$email 		= trim($_POST["email"]);
	$fio 		= trim($_POST["fio"]);
	$error 		= '';
		
			
	if ( !filter_var($email, FILTER_VALIDATE_EMAIL) && $email<>'' ){
		
		$error .= '<li>Укажите верно Ваш емаил</li>';
		
	}
	if ( $email=='' ){
		
		$error .= '<li>Поле емаил должно быть заполнено</li>';
		
	}
	if ( $fio=='' ){
		
		$error .= '<li>Поле ФИО должно быть заполнено</li>';
		
	}	
	if ( $login=='' ){
		
		$error .= '<li>Поле Логин должно быть заполнено</li>';
		
	}
	if ( $password=='' || $repassword==''){
		
		$error .= '<li>Поле Пароль должно быть заполнено</li>';
		
	}
	if ( $password!=$repassword ){
		
		$error .= '<li>Пароли не совпадают</li>';
		
	}
	if ( mb_strlen($login, 'UTF-8')<6 && $login<>''){
		
		$error .= "<li>Логин должен содержать минимум 6 символов</li>";
		
	}
	if ( (mb_strlen($password, 'UTF-8')<6 || mb_strlen($repassword, 'UTF-8')<6) && $password<>'' ){
		
		$error .= "<li>Пароль должен содержать минимум 6 символов</li>";
		
	}
	if ( !preg_match("/^[a-z0-9]+$/si", $login) && $fio<>'') {
		
		$error .= "<li>Логин должен содержать только латинские буквы и цифры</li>";
		
	}
	if ( !preg_match('/^[а-яёА-ЯЁ\s]+$/u', $fio) && $fio<>'' ) {
		
		$error .= "<li>ФИО должен содержать только латинские буквы и цифры</li>";
		
	} 

			
	if( $error == '' ){

		$query = sprintf("SELECT id FROM $users_table where login = '%s' ;", $login);
		$result = mysql_query($query);
		if(!mysqli_error()){
			$number_login = intval(mysql_num_rows($result));
			
			if($number_login>0){
				$error .= "<li>Такой логин уже зарегистрирован, выберите другой</li>";
			}
		}
	
	}		

	if( $error == '' ){
			$query_add = sprintf("INSERT INTO $users_table (email, password, login, fio) VALUES ('%s','%s','%s','%s');", $email, md5($password), $login, $fio);
			
			mysql_query($query_add);
			
			if(!mysql_error()){
				$inner_header_meta = '<meta http-equiv="refresh" content="0; url=index.php" />';	
			}
			else{
				echo mysql_error();
			}
			

		}
	}	
