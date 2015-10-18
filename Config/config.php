<?php

	/**
	 * Bootstrap PDO Connection
	 */

	// PDOX Class
	class PDOX extends PDO{

		private static $connection = NULL;

	    public static function connect(){
	        if(PDOX::$connection === NULL){
	            PDOX::$connection = new PDO('mysql:host='.connection_host.';dbname='.connection_db, connection_user, connection_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND =>  "SET NAMES utf8") );
	            return PDOX::$connection;
	        } else {  
	        	return PDOX::$connection;
	        }
	    }

	}

	try {
		$pdo = PDOX::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (Exception $e) {
		die($e);
	}

?>