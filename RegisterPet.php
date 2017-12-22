
<?php
	//include information required to access database
	require 'authentication.php'; 

	//start a session 
	session_start();
	$errorMessage = 'Register a Pet';

	//still logged in?
	if (!isset($_SESSION['db_is_logged_in'])
		|| $_SESSION['db_is_logged_in'] != true) {
		//not logged in, move to login page
		header('Location: AdoptaPetLogin.php');
		exit;
	} else {

		//logged in 
		// Prepare query
		if(isset ($_POST['Pet'])) {
			$table = "Pet";
			$petname = $_POST['petName'];
			$age = $_POST ['age'];
			$breed= $_POST ['breed'];
			$gender=$_POST ['gender'];
			$animaltype=$_POST['animaltype'];
			$uid=$_POST['userid'];
			$pid=$_POST['programid'];
			$query = "INSERT INTO $table VALUES ('$petname', '$age','$breed','$gender','$animaltype','$uid','$pid')";

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
<title>Register a Pet for Adoption</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

	<div id="conteneur">
		  
		  <?php include 'navbar.php'; ?>
		<div id="centre">
 <div class="w3-container w3-padding-32" id="projects">

	 <img class="w3-image" src="http://www.a1westsidepetsitter.com/s/img/emotionheader.jpg"  width="1500" height="100">
    <div class="w3-display-middle w3-margin-top w3-center">
   <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>Adopt a Pet</b></span> <span class="w3-hide-small w3-text-black"><b>Register Pet for Adoption</b></span></h1>
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
		   <td width="150">Age</td>
		   <td><input name="age" type="text" id="age"></td>
		  </tr>
		  <tr>
		  <tr>
		   <td width="150">Breed</td>
		   <td><input name="breed" type="text" id="breed"></td>
		  </tr>
		   <tr>
		  <tr>
		   <td width="150">Gender</td>
		   <td><input name="gender" type="text" id="gender"></td>
		  </tr>
		   <tr>
		  <tr>
		   <td width="150">Animal Type</td>
		   <td><input name="animaltype" type="text" id="animal"></td>
		  </tr>
		   <tr>
		  <tr>
		   <td width="150">User ID</td>
		   <td><input name="userid" type="text" id="userid"></td>
		  </tr>
		   <tr>
		  <tr>
		   <td width="150">Program ID</td>
		   <td><input name="programid" type="text" id="programid"></td>
		  </tr>
		  <tr>
		   <td width="150">&nbsp;</td>
		   <td><input name="btnLogin" type="submit" id="btnLogin" value="Submit"></td>
		  </tr>
		 </table>
		</form>
		<p style="font-family:helvetica;"><h4>If the pet has been previously adopted, fill out this <a href="AdoptionHistory.php">form.</h4></a></p>

	</body>
</html>


