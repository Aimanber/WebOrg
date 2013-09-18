<?php
	require 'db_script.php';
	db_connection();
	
		if ( isset ( $_POST['row'] ) ) 
		{ 
			$ids = implode( ',', $_POST['row'] ); 
			$query = 'DELETE FROM category WHERE c_id IN ('.$ids.')'; 
			mysql_query( $query ); 
			header ("location: userPage.php") ;
		}	
		
		if ( isset ( $_POST['rowPost'] ) ) 
		{ 
			$ids = implode( ',', $_POST['rowPost'] ); 
			$query = 'DELETE FROM category WHERE c_id IN ('.$ids.')'; 
			mysql_query( $query ); 
			header ("location: admin.php") ;
		}
	
		if ( isset ( $_POST['rowUser'] ) ) 
		{ 
			$ids = implode( ',', $_POST['rowUser'] ); 
			$query = 'DELETE FROM user WHERE u_id IN ('.$ids.')'; 
			mysql_query( $query ); 
			header ("location: admin.php") ;
		}
?>