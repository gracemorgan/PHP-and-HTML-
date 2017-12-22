<!DOCTYPE html>
<html>
<title>All Adoptable Pets</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

	<div id="conteneur">
		  
		  <?php include 'navbar.php'; ?>
		  <?php require 'authentication.php';?>
		<div id="centre">
 <div class="w3-container w3-padding-32" id="projects">
   

	 <img class="w3-image" src="http://www.a1westsidepetsitter.com/s/img/emotionheader.jpg"  width="1500" height="100">
    <div class="w3-display-middle w3-margin-top w3-center">
   <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>Adopt a Pet</b></span> <span class="w3-hide-small w3-text-black"><b>All Pets</b></span></h1>
  </div>
  </div>
  <?php

		
		// connect to the server
		$connection = sqlsrv_connect( $server, $connectionInfo )
			or die("ERROR: selecting database server failed");
	
		

		
		// prepare SQL query
		
		$query = "SELECT * FROM PET";
		
		// Execute SQL query
		$query_result = sqlsrv_query($connection, $query)
			or die( "ERROR: Query is wrong");
		
		// Output query results: HTML table
		echo "<table border=1>";
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
		<input type="text" name="keyword" /><br>
		<input type="submit" value="Search"/>
		</form>
		<br>
		</body>
		</div>

	<?php
	
		
		// Connect database server
		$connection = sqlsrv_connect( $server, $connectionInfo )
			or die("ERROR: selecting database server failed");
			if (!empty($_POST['keyword'])){
				$pid=$_POST['keyword'];
	
		
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
  <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Fluffy</div>
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/%27Mumbai_Doll-faced_Persian_kitten%276_weeks_old..jpg/811px-%27Mumbai_Doll-faced_Persian_kitten%276_weeks_old..jpg" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Charlie</div>
        <img src="data:image/jpeg;base64,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" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Marley</div>
        <img src="https://upload.wikimedia.org/wikipedia/commons/8/82/Golden_Retriever_standing_Tucker.jpg" alt="House" style="width:100%">
      </div>
    </div>
   
  <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Coco</div>
        <img src="data:image/jpeg;base64,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" alt="House" style="width:99%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Chloe</div>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZlupBjJDeHsIuMsQkLyA51QWCPbDZ9EVxCRB1GEYt42tUi0w2" alt="House" style="width:99%">
      </div>
    </div>
   
 
  </div>
  <br>
 
	
	</div>
</div>
</body>
</html>