<?php

	// Server, database name, sqluserid, and sqlpassword
	// Change to your own server, database, id and password

	$server = "upsql";
	$sqlUsername = "IST210FA1700109";
	$sqlPassword = "3lYpaOQb0EGTV8r";
	$databaseName = "IST210-jxw394-FA17-001-Team09";
			
	$connectionInfo = array('Database'=>$databaseName, 'UID'=>$sqlUsername, 'PWD'=>$sqlPassword, 
									'Encrypt'=>'0', 'ReturnDatesAsStrings'=>true );


	//function to authenticate user, and return TRUE or FALSE 
	function authenticateUser($connection, $loginUserId, $loginPassword)
	{
	  // User table which stores userid and password
	  // Change to your own table name 
	  $userTable = "user_table"; 

	  // Test the username and password parameters
	  if (!isset($loginUserId) || !isset($loginPassword))
		return false;

	  $pa = md5($loginPassword);  
	  // Formulate the SQL statment to find the user
	  $query = "SELECT * 
				 FROM $userTable 
				 WHERE username COLLATE Latin1_General_CS_AS = '{$loginUserId}' AND userpassword COLLATE Latin1_General_CS_AS = '{$pa}'";
	  echo $query;
	  
	  // Execute the query
	 $query_result = sqlsrv_query($connection, $query, array(), array("Scrollable"=>SQLSRV_CURSOR_KEYSET))
		or die( "ERROR: Query is wrong");

	  // exactly one row? then we have found the user
	  if ( sqlsrv_num_rows($query_result)!= 1)
		return false;
	  else
		return true;
	}

?>
