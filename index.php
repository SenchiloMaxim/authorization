<?php
header("Content-Type: text/html; charset=UTF-8");
header("X-XSS-Protection: 1; mode=block");
header("Referrer-Policy: no-referrer");
header("Referrer-Policy: strict-origin-when-cross-origin");
header("X-Frame-Options:sameorigin");
header("X-Permitted-Cross-Domain-Policies: none");
header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
header("X-Content-Type-Options: nosniff");
header_remove('x-powered-by');
session_start();
error_reporting(0);
ini_set('display_errors',0);

if(isset($_GET['exit'])){
	unset($_SESSION['password']);
	unset($_SESSION['login']);
}

INCLUDE "db/conf_bd.php";
INCLUDE "source/authorization_check.php";

if($authorization_check == 0){
	INCLUDE 'source/authorization.php';
	INCLUDE 'source/registration.php';
}
else{
	if( isset($_GET['profile']) ){
		INCLUDE 'source/profile.php';
	}
	if( isset($_GET['repass']) ){
		INCLUDE 'source/repass.php';
	}
}




?>
<!DOCTYPE HTML>
<html lang="ru" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?=$inner_header_meta?>
	<link rel="stylesheet" href="<?=$url_link?>/bootstrap/css/bootstrap.min.css">
	<script src="<?=$url_link?>/bootstrap/js/bootstrap.min.js"></script>
	<style>
		body{
			margin: 20px;
		}
		nav{
			margin: 10px 0 10px 0;
		}
	</style>
</head>
<body>
<?php
INCLUDE 'template/menu.php';

if( isset($_GET['authorization']) && $authorization_check == 0 ){
	INCLUDE 'template/authorization.php';
}
elseif( isset($_GET['registration']) && $authorization_check == 0 ){
	INCLUDE 'template/registration.php';
}
elseif( isset($_GET['profile']) && $authorization_check == 1 ){
	INCLUDE 'template/profile.php';
}
elseif( isset($_GET['repass']) && $authorization_check == 1 ){
	INCLUDE 'template/repass.php';
}
else{
	
	/* не приходилось регулярно использовать такие запросы, а в битриксе с которым последний год работал так совсем нет прямых запросов в базу */
	/* перед выпорлнением читал */
	//https://shra.ru/2017/09/sql-join-v-primerakh-s-opisaniem/
	//https://webcodius.ru/sql/soedinenie-tablic-ili-dejstvie-operatora-sql-join-na-primerax.html
	
	
	//список email'лов встречающихся более чем у одного пользователя
	echo '<p>
	SELECT `email` FROM `ew_users` GROUP BY `email` HAVING COUNT( * ) >1</p>';
	//вывести список логинов пользователей, которые не сделали ни одного заказа
	echo '<p>SELECT ew_users.login FROM ew_users LEFT OUTER JOIN ew_orders ON ew_users.id = ew_orders.user_id WHERE ew_orders.user_id IS null</p>';
	//вывести список логинов пользователей которые сделали более двух заказов
	echo '<p>SELECT ew_users.login, COUNT( user_id ) AS order_count FROM `ew_orders` JOIN ew_users ON ew_orders.user_id = ew_users.id GROUP BY `user_id` HAVING order_count >2</p>';
	
}

?>
</body>
</html>