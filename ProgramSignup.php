<?php
	//include information required to access database
	require 'authentication.php'; 

	//start a session 
	session_start();
	$errorMessage = 'Enter Adoption Information';

	//still logged in?
	if (!isset($_SESSION['db_is_logged_in'])
		|| $_SESSION['db_is_logged_in'] != true) {
		//not logged in, move to login page
		header('Location: AdoptaPetLogin.php');
		exit;
	} else {

		//logged in 
		// Prepare query
		if(isset ($_POST['Adoption_Program'])) {
			$table = "Adoption_Program";
			$name = $_POST['programName'];
			$location = $_POST['programLocation'];
			$email = $_POST['programEmail'];
			$phone = $_POST ['programPhone'];
			$type = $_POST['programType'];
			$authen = $_POST ['authentication'];
			$query = "INSERT INTO $program VALUES ('$name','$location', '$email', '$phone', '$type','$authen')";
			
			
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
<title>Program Signup</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<?php include 'navbar.php'; ?>

<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="https://www.dealwithautism.com/news/wp-content/uploads/Autism-and-Pets.jpg"  width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>Adopt a Pet</b></span> <span class="w3-hide-small w3-text-black"><b>Program Signup</b></span></h1>
  </div>
  </header>
	<head>
		<title>Adopt a Pet User Signup</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	</head>
	<head>
		<title>Program Signup</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	</head>

	<body>
		<Strong> <?php echo $errorMessage ?> </Strong>

		<form action="" method="post" name="frmLogin" id="frmLogin">
		 <table width="300" border="1" align="center" cellpadding="2" cellspacing="2">
			<tr>
		  <tr>
		   <td width="150">Program Name</td>
		   <td><input name="programName" type="text" id="programName"></td>
		  </tr>
		  <tr>

		  <tr>
		   <td width="150">Program Location</td>
		   <td><input name="programLocation" type="text" id="programLocation"></td>
		  </tr>
		  <tr>
		  <tr>
		   <td width="150">Email Address</td>
		   <td><input name="programEmail" type="text" id="programEmail"></td>
		  </tr>
		   <tr>
		  <tr>
		   <td width="150">Phone Number</td>
		   <td><input name="programPhone" type="text" id="programPhone"></td>
		  </tr>
		   <tr>
		  <tr>
		   <td width="150">Program Type</td>
		   <td><input name="programType" type="text" id="programType"></td>
		  </tr>
		   <tr>
		  <tr>
		   <td width="150">Authentication</td>
		   <td><input name="authentication" type="text" id="authentication"></td>
		  </tr>
		  <tr>
		   <td width="150">&nbsp;</td>
		   <td><input name="btnLogin" type="submit" id="btnLogin" value="Register"></td>
		  </tr>
		 </table>
		</form>

	</body>
</html>
