<?php 
	include("includes/config.php");
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");
    
    
    $account = new Account($con);
    
	include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");

    function getInputValue($name) {
    	if(isset($_POST[$name])) {
    		echo $_POST[$name];
    	}
    }

 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to Slotify</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>


<body>
	<?php 
	if(isset($_POST['registerButton'])) {
		echo '<script >
				$(document).ready(function() {
					
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
	}
	else {
		echo '<script >
				$(document).ready(function() {
					
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';

	}



	?>

	

	<div id="background">
		
		<div id="loginContainer">
	
			<div id="inputContainer">
				
				
				<!-- LOGIN -->
				<form id="loginForm" action="register.php" method="POST">
					<h2>Login to your account</h2>
					<p>
						<?php echo $account->getError(Constants::$loginFailed); ?>
						<label for="loginUsername">Username</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. jsmith" value="<?php getInputValue('loginUsername') ?>"required>
		            </p>
		            <p>
		            	<label for="loginPassword">Password</label>
		 				<input id="loginPassword" name="loginPassword" type="password" placeholder=" password" required>
		            </p>

		            <button type="submit" name="loginButton">LOG IN</button>

		            <div class="hasAccountText">
		            	<span id="hideLogin">Don't have an account? Signup here.</span>
		            	
		            </div>

				</form>

				
				<!-- REGISTER LOGIN -->
				<form id="registerForm" action="register.php" method="POST">
					<h2>Create your free account</h2>
					<p>
						<?php echo $account->getError(Constants::$usernameTaken); ?>
						<?php echo $account->getError(Constants::$userNamecharacters); ?>
						<label for="username">Username</label>
						<input id="username" name="username" type="text" placeholder="e.g. jsmith" value="<?php getInputValue('username') ?>" required>
		            </p>
		            <p>
		            	<?php echo $account->getError(Constants::$firstNamecharacters); ?>
						<label for="firstname">First name</label>
						<input id="firstname" name="firstname" type="text" placeholder="e.g. Joe" value="<?php getInputValue('firstname') ?>" required>
		            </p>
		            <p>
		            	<?php echo $account->getError(Constants::$lastNamecharacters); ?>
						<label for="lastname">Last name</label>
						<input id="lastname" name="lastname" type="text" placeholder="e.g. Smith" value="<?php getInputValue('lastname') ?>" required>
		            </p>
		            <p>
		            	<?php echo $account->getError(Constants::$emailInvalid); ?>
		            	<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
		            	<?php echo $account->getError(Constants::$emailTaken); ?>
						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder="e.g. jsmith@gmail.com" value="<?php getInputValue('email') ?>"  required>
		            </p>
		            <p>
		            	
						<label for="email2">Confirm Email</label>
						<input id="email2" name="email2" type="email" placeholder="e.g. jsmith@gmail.com" value="<?php getInputValue('email2') ?>" required>
		            </p>
		            <p>
		            	<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
		            	<?php echo $account->getError(Constants::$passwordNotAlphaNumeric); ?>
		            	<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<label for="password">Password</label>
		 				<input id="password" name="password" type="password" placeholder="Your password"  required>
		            </p>
					<p>
						
		            	<label for="password2">Confirm password</label>
		 				<input id="password2" name="password2" type="password" placeholder="Confirm password"  required>
		            </p>
		            <button type="submit" name="registerButton">Sign Up</button>

		            <div class="hasAccountText">
		            	<span id="hideRegister">Aready have an account? Login here.</span>
		            </div>	



				</form>
				
			</div>
			<div id="loginText">
				<h1>Get great music, right now</h1>
				<h2>Listen to tons of songs for free</h2>
				<ul>
					<li>Discover music you'll love</li>
					<li>Create your own playlist</li>
					<li>Follow artist to stay up to date</li>
				</ul>

			</div>
		</div>	
	</div>
</body>
</html>








