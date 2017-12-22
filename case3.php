<html>
<head>
<title> PHP SQL Example </title>

<h3> Case 3: Browse the employee information for a particular department.- Automatic Coding </font> </h3> 

<h3> You want to browse the employees in which department? </h3>

<form action="" method="post">

<?php
	$server = "upsql";
	$sqlUsername = "IST210FA1700109";
	$sqlPassword = "3lYpaOQb0EGTV8r";
	$databaseName = "IST210-jxw394-FA17-001-Team09";
	
	$connectionInfo = array('Database'=>$databaseName, 'UID'=>$sqlUsername, 'PWD'=>$sqlPassword, 'Encrypt'=>'0', 'ReturnDatesAsStrings'=>true );
	$connection = sqlsrv_connect( $server, $connectionInfo )
		or die("ERROR: database parameters are not correct");
	
	// Prepare SQL query
	$query = "SELECT DISTINCT Department FROM EMPLOYEE";
	
	// Execute SQL query
	$result = sqlsrv_query($connection, $query)
		or die( "ERROR: Query is wrong");
		
	
	echo "<select name=\"department\">";
	// fetch table records
	while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ) {
		$deptname = $row['Department'];
		echo "<option value=\"$deptname\"> $deptname</option>";
	}
	echo "</select>";
	
	// close the connection with database
	sqlsrv_close($connection);
?>

<input type="submit" value="Submit"/>
	
<?php
	$connectionInfo = array('Database'=>$databaseName, 'UID'=>$sqlUsername, 'PWD'=>$sqlPassword, 'Encrypt'=>'0', 'ReturnDatesAsStrings'=>true );
	$connection = sqlsrv_connect( $server, $connectionInfo )
		or die("ERROR: database parameters are not correct");

	if (!empty($_POST['department'])) {
			
		// get the employeeID
		$department = $_POST['department'];
		
		// prepare SQL query
		$query = "SELECT * FROM EMPLOYEE WHERE EMPLOYEE.Department='$department'";

		
		// print the query
		echo "Query: ".$query."<br>";
		
		// Execute SQL query
		$result = sqlsrv_query($connection, $query)
			or die( "ERROR: Query is wrong");
		
		// Display results in a table
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
</form>
</html>