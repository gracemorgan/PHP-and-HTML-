<?php
	//include information required to access database
	require 'authentication.php'; 

	//start a session 
	session_start();
	$errorMessage = 'Enter Adoption History';

	//still logged in?
	if (!isset($_SESSION['db_is_logged_in'])
		|| $_SESSION['db_is_logged_in'] != true) {
		//not logged in, move to login page
		header('Location: AdoptaPetLogin.php');
		exit;
	} else {

		//logged in 
		// Prepare query
		if(isset ($_POST['Adoption_History'])) {
			$table = "Adoption_History";
			$petname = $_POST['petName'];
			$date = $_POST ['date'];
			$adoptee= $_POST ['adoptee'];
			$adopter=$_POST ['adopter'];
			$location=$_POST['adoptionLocation'];
			$petid=$_POST['petid'];
			$query = "INSERT INTO $table VALUES ('$petname', '$date','$adoptee','$adopter','$location','$petid')";

		// Execute query
		// Connect database server
		$connection = sqlsrv_connect( $server, $connectionInfo )
			or die("ERROR: selecting database server failed");
		$query_result = sqlsrv_query($connection, $query)
			or die( "ERROR: Query is wrong");
		
		// close the connection
		sqlsrv_close($connection);
	}}
?>
<!DOCTYPE html>
<html>
<title>Enter Adoption History</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

	<div id="conteneur">
		  
		  <?php include 'navbar.php'; ?>
		<div id="centre">
 <div class="w3-container w3-padding-32" id="projects">
   
	 <img class="w3-image" src="http://www.a1westsidepetsitter.com/s/img/emotionheader.jpg"  width="1500" height="800">
    <div class="w3-display-middle w3-margin-top w3-center">
   <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>Adopt a Pet</b></span> <span class="w3-hide-small w3-text-black"><b>Enter Adoption History</b></span></h1>
  </div>
  </div>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	</head>

	<body>
	

		<Strong> <?php echo $errorMessage ?> </Strong>

		<form action="" method="post" name="frmLogin" id="frmLogin">
		 <table width="300" border="1" align="center" cellpadding="2" cellspacing="2">
		  <tr>
		   <td width="150">Pet Name</td>
		   <td><input name="petName" type="text" id="petName"></td>
		  </tr>
		  <tr>

		  <tr>
		   <td width="150">Adoption Date</td>
		   <td><input name="date" type="text" id="date"></td>
		  </tr>
		  <tr>
		  <tr>
		   <td width="150">Adoptee</td>
		   <td><input name="adoptee" type="text" id="adoptee"></td>
		  </tr>
		   <tr>
		  <tr>
		   <td width="150">Adopter</td>
		   <td><input name="adopter" type="text" id="adopter"></td>
		  </tr>
		   <tr>
		  <tr>
		   <td width="150">Animal Type</td>
		   <td><input name="animaltype" type="text" id="animaltype"></td>
		  </tr>
		   <tr>
		  <tr>
		   <td width="150">Pet ID</td>
		   <td><input name="petid" type="text" id="petid"></td>
		  </tr>
		  <tr>
		   <td width="150">&nbsp;</td>
		   <td><input name="btnLogin" type="submit" id="btnLogin" value="Submit"></td>
		  </tr>
		 </table>
		</form>
	</body>
</html>
