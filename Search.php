<!DOCTYPE html>
<html>
<title> Search Adoptable Pets</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
		  <?php include 'navbar.php'; ?>
		  <div class="w3-content w3-padding" style="max-width:1564px">
		   <img class="w3-image" src="http://www.a1westsidepetsitter.com/s/img/emotionheader.jpg"  width="1500" height="100">
		   <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>Adopt a Pet</b></span> <span class="w3-hide-small w3-text-black"><b>Search</b></span></h1>
  </div>
		<div id="centre">
		<div id="body">
		<body>
		<form method="post">
<p style="font-family:helvetica;"><h4> Keyword Search</h4></p>
		<input type="text" name="keyword" /><br>
		<input type="submit" value="Search"/>
		</form>
		<br>
		</body>
		</div>

	<?php
		require 'authentication.php';
		
		// Connect database server
		$connection = sqlsrv_connect( $server, $connectionInfo )
			or die("ERROR: selecting database server failed");
			if (!empty($_POST['keyword'])){
				$keyword=$_POST['keyword'];
	
		
		// prepare SQL query
		$query = "SELECT * FROM PET WHERE ((Pet.PetName LIKE '%".$keyword."%') OR (Age LIKE '%".$keyword."%')OR (Gender LIKE '%".$keyword."%')
		OR (AnimalType LIKE '%".$keyword."%') OR (Breed LIKE '%".$keyword."%') OR (CurrentLocation LIKE '%".$keyword."%'))" ;
		
		// Execute SQL query
		$query_result = sqlsrv_query($connection, $query)
			or die( "ERROR: Query is wrong");
		
		// Output query results: HTML table
		echo "<table border=2>";
		echo "<tr>";
		
		// fetch attribute names
		foreach( sqlsrv_field_metadata($query_result) as $fieldMetadata)
			echo "<th>".$fieldMetadata['Name']."</th>";
		echo "</tr>";
		
		// fetch table records
		while ($line = sqlsrv_fetch_array($query_result, SQLSRV_FETCH_ASSOC)) {
			echo "<tr>\n";
			foreach ($line as $cell) {
				echo "<td> $cell </td>";
			}
			echo "</tr>\n";
		}
		echo "</table>";
			}
		// close the connection with database
		sqlsrv_close($connection);
	?>
	<br>
 <form method="post">
		<p style="font-family:helvetica;"><h4> Search Pet ID to learn adoption history</h4></p>
		<input type="text" name="petid" /><br>
		<input type="submit" value="Search"/>
		</form>
		<br>
		</body>
		</div>

	<?php
	
		
		// Connect database server
		$connection = sqlsrv_connect( $server, $connectionInfo )
			or die("ERROR: selecting database server failed");
			if (!empty($_POST['petid'])){
				$petid=$_POST['petid'];
	
		
		// prepare SQL query
		$query = "SELECT * FROM ADOPTION_HISTORY WHERE PetID=$petid";
		// Execute SQL query
		$query_result = sqlsrv_query($connection, $query)
			or die( "ERROR: Query is wrong");
		
		// Output query results: HTML table
		echo "<table border=2>";
		echo "<tr>";
		
		// fetch attribute names
		foreach( sqlsrv_field_metadata($query_result) as $fieldMetadata)
			echo "<th>".$fieldMetadata['Name']."</th>";
		echo "</tr>";
		
		// fetch table records
		while ($line = sqlsrv_fetch_array($query_result, SQLSRV_FETCH_ASSOC)) {
			echo "<tr>\n";
			foreach ($line as $cell) {
				echo "<td> $cell </td>";
			}
			echo "</tr>\n";
		}
		echo "</table>";
			}
		// close the connection with database
		sqlsrv_close($connection);
	?>
	<br>
 <form method="post">
		<p style="font-family:helvetica;"><h4> Search Program ID to get contact information to adopt</h4></p>
		<input type="text" name="programid" /><br>
		<input type="submit" value="Search"/>
		</form>
		<br>
		</body>
		</div>

	<?php
	
		
		// Connect database server
		$connection = sqlsrv_connect( $server, $connectionInfo )
			or die("ERROR: selecting database server failed");
			if (!empty($_POST['programid'])){
				$pid=$_POST['programid'];
	
		
		// prepare SQL query
		$query = "SELECT * FROM ADOPTION_PROGRAM WHERE ProgramID=$pid";
		// Execute SQL query
		$query_result = sqlsrv_query($connection, $query)
			or die( "ERROR: Query is wrong");
		
		// Output query results: HTML table
		echo "<table border=2>";
		echo "<tr>";
		
		// fetch attribute names
		foreach( sqlsrv_field_metadata($query_result) as $fieldMetadata)
			echo "<th>".$fieldMetadata['Name']."</th>";
		echo "</tr>";
		
		// fetch table records
		while ($line = sqlsrv_fetch_array($query_result, SQLSRV_FETCH_ASSOC)) {
			echo "<tr>\n";
			foreach ($line as $cell) {
				echo "<td> $cell </td>";
			}
			echo "</tr>\n";
		}
		echo "</table>";
			}
		// close the connection with database
		sqlsrv_close($connection);
	?>
	<br>

	</div>
</div>
</body>
</html>