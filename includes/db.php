<?php

function ejecutaQuery($query,$parametros){
	try{
		$serverName = "DESARROLLADOR4\SQLEXPRESS"; //serverName\instanceName
		$connectionInfo = array( "Database"=>"agencia", "UID"=>"agencia", "PWD"=>"agencia");

		$array = array();
		$conn = sqlsrv_connect( $serverName, $connectionInfo);
		$i = 0;

		if( $conn ) {
			$stmt = "";
			if ($parametros == "") {
				$stmt = sqlsrv_query( $conn, $query);
			} else {
				$stmt = sqlsrv_query( $conn, $query, $parametros);
			}
			
			if( $stmt === false ){
			     die( print_r( sqlsrv_errors(), true));
			}
			else{
				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
					$array[$i] = $row;
					$i++;
			    }
			}
		}else{
		     die( print_r( sqlsrv_errors(), true));
		}

		sqlsrv_free_stmt( $stmt);
		sqlsrv_close( $conn);


		return $array;
	} catch(Exception $e){
		print_r( $e->getMessage(), true);
	}
	
}