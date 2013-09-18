<?php
	require 'db_script.php';
	db_connection();
		
	if ( isset ( $_POST['row'] ) ) 
		{ 
			$ids = implode( ',', $_POST['row'] ); 
			$query = 'DELETE FROM category WHERE c_id IN ('.$ids.')'; 
			mysql_query( $query ); 
			header ("location: admin.php") ;
		}
	
	
?>