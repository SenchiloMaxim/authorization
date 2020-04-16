<?php

if(isset($_POST['refresh_profile'])){


	$fio 		= trim($_POST["fio"]);
	$error 		= '';
		
	if ( $fio=='' ){
		$error .= '<li>Поле ФИО должно быть заполнено</li>';
	}	
	
	if ( !preg_match('/^[а-яёА-ЯЁ\s]+$/u', $fio) && $fio<>'' ) {
		$error .= "<li>ФИО должен содержать только латинские буквы и цифры</li>";
	} 
	
	

	if( $error == '' ){
			$query_refresh = sprintf("UPDATE $users_table SET  fio='%s' WHERE id='%d';",  $fio, $id_user);
			mysql_query($query_refresh);
			
			if(!mysql_error()){
				$inner_header_meta = '<meta http-equiv="refresh" content="0; url=index.php?profile" />';	
			}
			else{
				echo mysql_error();
			}
			

		}
	}	
