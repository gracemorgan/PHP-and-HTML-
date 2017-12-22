<html>
<head>
<title> PHP SQL Example </title>
</head>

<body>
<h3> Query </h3>

<form action="" method="post">
	Which table to query: <input type="text" name="table" /> <br> <br>
	<input type="submit" />
</form>

<?php
	$server = "upsql";
	$sqlUsername = "gkm5110";
	$sqlPassword = "hX3MUrDg";
	$databaseName = "gkm5110";
	
	$connectionInfo = array('Database'=>$databaseName, 'UID'=>$sqlUsername, 'PWD'=>$sqlPassword, 'Encrypt'=>'0', 'ReturnDatesAsStrings'=>true );
	$connection = sqlsrv_connect( $server, $connectionInfo )
		or die("ERROR: database parameters are not correct");
		
	if (!empty($_POST['table'])) {
		// get the table name
		$table = $_POST['table'];
		
		// prepare SQL query
		$query = "SELECT * FROM $table";
		
		// print the query
		echo "Query: ".$query."<br>";
		
		// Execute SQL query
		$result = sqlsrv_query($connection, $query)
			or die( "ERROR: Query is wrong");
		
		echo "<table border=1>";
		echo "<tr>";
		
		// fetch attribute names
		foreach( sqlsrv_field_metadata($result) as $fieldMetadata)
			echo "<th>".$fieldMetadata['Name']."</th>";
		echo "</tr>";
		
		// fetch rows in the table
		while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ) {
			echo "<tr>\n";
			foreach ($row as $cell) {
				echo "<td> $cell </td>";
			}
			echo "</tr>\n";
		}
		
		echo "</table>";
	}
		
	// close the connection with database
	sqlsrv_close( $connection);
?>

</body>
</html>















