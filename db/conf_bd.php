<?php
$host_db = "localhost";
$user_db = 'root';
$pass_db = '';
$name_bd = 'example_work';
	
$prefix = 'ew_';
$users_table = $prefix.'users';
$orders_table = $prefix.'orders';

	

		$connect_db = mysql_connect($host_db, $user_db, $pass_db) OR DIE ('Скрипт не может установить соединение с базой данных');
		mysql_select_db($name_bd, $connect_db);
		mysqli_query($connect_db, "set character_set_client='utf-8'");
		mysqli_query($connect_db, "set character_set_results='utf-8'");
		mysqli_query($connect_db, "set collation_connection='utf-8_general_ci'");
		mysqli_query($connect_db, 'SET CHARACTER SET utf8');
		mysqli_query($connect_db, 'SET NAMES utf8');

		$url_link = 'http://'.$_SERVER['HTTP_HOST'];

	