<?php

	//include database information and user information
	require 'authentication.php';

	//never forget to start the session
	session_start();
	$errorMessage = 'Create a user account';

	//are user ID and Password provided?
	if (isset($_POST['txtUserId']) && isset($_POST['txtPassword']) &&
		isset($_POST['retxtPassword'])) {

		//get userID and Password
		$loginUserId = $_POST['txtUserId'];
		$loginPassword = $_POST['txtPassword'];
		$reLoginPassword = $_POST['retxtPassword'];
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$email = $_POST['email'];
		$background = $_POST ['backgroundCheck'];
		$zip = $_POST['zipCode'];
		$phone = $_POST ['phone'];
		
		if ($loginPassword == $reLoginPassword) {
		
		//connect to the database
		$connection = sqlsrv_connect( $server, $connectionInfo )
			or die("ERROR: selecting database server failed");
		
		//table to store username and password
		$userTable = "user_table"; 

		$ps = md5($loginPassword);
			
		//table for user profile
		$userTable = "user_table"; 

		// Formulate the SQL statment to find the user
		$query = "INSERT INTO $userTable VALUES ('$firstName','$lastName', '$loginUserId', '$ps', '$background','$email', '$phone', '$zip')";
		
		// Execute the query
		$query_result = sqlsrv_query($connection, $query)
			or die( "SQL Query ERROR. User can not be created.");

		// Go to the login page
		header('Location: AdoptaPetLogin.php');
		exit;
		} else {
		$errorMessage = "Passwords do not match";
		}
	}
?>

<!DOCTYPE html>
<html>
<title>User Signup</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<?php include 'navbar.php'; ?>

<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="https://www.dealwithautism.com/news/wp-content/uploads/Autism-and-Pets.jpg"  width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>Adopt a Pet</b></span> <span class="w3-hide-small w3-text-black"><b>Signup</b></span></h1>
  </div>
  </header>
	<head>
		<title>Adopt a Pet User Signup</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	</head>

		<Strong> <?php echo $errorMessage ?> </Strong>

		<form action="" method="post" name="frmLogin" id="frmLogin">
		 <table width="300" border="1" align="center" cellpadding="2" cellspacing="2">
		  <tr>
		   <td width="150">Select User ID *</td>
		   <td><input name="txtUserId" type="text" id="txtUserId"></td>
		  </tr>
		  <tr>
		   <td width="150">Type Password *</td>
		   <td><input name="txtPassword" type="password" id="txtPassword"></td>
		  </tr>
		  <tr>
		   <td width="150">Retype Password *</td>
		   <td><input name="retxtPassword" type="password" id="retxtPassword"></td>
		  </tr>


		  <tr>
		   <td width="150">First Name</td>
		   <td><input name="firstName" type="text" id="firstName"></td>
		  </tr>
		  <tr>

		  <tr>
		   <td width="150">Last Name</td>
		   <td><input name="lastName" type="text" id="lastName"></td>
		  </tr>
		  <tr>
		  <tr>
		   <td width="150">Email Address</td>
		   <td><input name="email" type="text" id="email"></td>
		  </tr>
		   <tr>
		  <tr>
		   <td width="150">Background Check</td>
		   <td><input name="backgroundCheck" type="text" id="backgroundCheck"></td>
		  </tr>
		   <tr>
		  <tr>
		   <td width="150">Phone Number</td>
		   <td><input name="phone" type="text" id="phone"></td>
		  </tr>
		   <tr>
		  <tr>
		   <td width="150">Zip Code</td>
		   <td><input name="zipCode" type="text" id="zipCode"></td>
		  </tr>
		  <tr>
		   <td width="150">&nbsp;</td>
		   <td><input name="btnLogin" type="submit" id="btnLogin" value="Sign In"></td>
		  </tr>
		 </table>
		</form>
	</body>
</html>
