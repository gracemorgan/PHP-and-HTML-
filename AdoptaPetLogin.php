<?php

	//include database information and user information
	require 'authentication.php';

	//never forget to start the session
	session_start();
	$errorMessage = '';

	//are user ID and Password provided?
	if (isset($_POST['txtUserId']) && isset($_POST['txtPassword'])) {

		//get userID and Password
		$loginUserId = $_POST['txtUserId'];
		$loginPassword = $_POST['txtPassword'];
		
		//connect to the database
		$connection = sqlsrv_connect( $server, $connectionInfo )
			or die("ERROR: selecting database server failed");
		
		// Authenticate the user
		if (authenticateUser($connection, $loginUserId, $loginPassword))
		{
			//the user id and password match,
			// set the session	
			$_SESSION['db_is_logged_in'] = true;
			$_SESSION['userID'] = $loginUserId;
			
			// after login we move to the main page
			header('Location: AdoptaPet.php');
			exit;
		} else {
			$errorMessage = 'Sorry, wrong username / password';
		}
	}
?>
<!DOCTYPE html>
<html>
<title>Adopt a Pet Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<?php include 'navbar.php'; ?>

<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="https://www.dealwithautism.com/news/wp-content/uploads/Autism-and-Pets.jpg"  width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>Adopt a Pet</b></span> <span class="w3-hide-small w3-text-black"><b>Login</b></span></h1>
  </div>
  </header>
	<Strong> <?php echo $errorMessage ?> </Strong>
		<p style="font-family:helvetica;">If you don't have an account, please <a href="signup.php">sign up</a>.</p><br><br>
		<form action="" method="post" name="frmLogin" id="frmLogin">
			 <table width="400" border="2" align="center" cellpadding="2" cellspacing="2">
				  <tr>
					<td width="150">User ID</td>
					<td><input name="txtUserId" type="text" id="txtUserId"></td>
				  </tr>
				  <tr>
					<td width="150">Password</td>
					<td><input name="txtPassword" type="password" id="txtPassword"></td>
				  </tr>
				  <tr>
					<td width="150">&nbsp;</td>
					<td><input name="btnLogin" type="submit" id="btnLogin" value="Login"></td>
				  </tr>
			 </table>
		</form>
	</body>
</html>

</body>
</html>