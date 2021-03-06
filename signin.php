<?php

require "php/scripts/connectToDatabase.php";

require "php/scripts/signinVariables.php";
require "php/scripts/accountSignin.php";

?>

<!DOCTYPE html>

<html lang="en-us">
	<head>
		<title>Sign In Page</title>

		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
			crossorigin="anonymous">

		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
			crossorigin="anonymous">
		</script>

		<!-- <link rel="stylesheet" href="css/style.css"/> -->
	</head>

	<body>
		<header class="container-fluid bg-light fixed-top">
			<nav class='navbar navbar-expand justify-content-center'>
				<ul class='navbar-nav mr-auto'>
					<li class='nav-item active'>
						<a class='nav-link' href='index.php'>Home</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link' href='login.php'>Log in</a>
					</li>
				</ul>
			</nav>
		</header>
		
		<main class="container-fluid my-5">
			<section class="row justify-content-center">
				<form
					class="col-8 pt-5 pb-5"
					method="POST"
					action="<?php echo( htmlspecialchars( $_SERVER[ "PHP_SELF" ] ) ); ?>"
				>
					<div class="form-group p-2">
						<input
							type="text"
							placeholder="First name *"
							minlength="3"
							maxlength="30"
							class="form-control"
							id="first-name-input"
							name="firstName"
							value="<?php echo( isset( $_POST[ "firstName" ] ) ? $_POST[ "firstName" ] : '' ); ?>"
							required
						>
					</div>

					<div class="form-group p-2">
						<input
							type="text"
							placeholder="Last name *"
							minlength="3"
							maxlength="30"
							class="form-control"
							id="last-name-input"
							name="lastName"
							value="<?php echo( isset( $_POST[ "lastName" ] ) ? $_POST[ "lastName" ] : '' ); ?>"
							required
						>
					</div>

					<div class="form-group p-2">
						<input
							type="email"
							placeholder="Email address"
							minlength="6" 
							maxlength="254"
							class="form-control"
							id="email-input"
							name="email"
							value="<?php echo( isset( $_POST[ "email" ] ) ? $_POST[ "email" ] : '' ); ?>"
							required
						>

						<span class="text-danger"><?php echo( $accountAlreadyExistingErrMsg ); ?></span>
					</div>

					<div class="form-group p-2">
						<input
							type="password"
							placeholder="Password **"
							minlength="10"
							maxlength="30"
							class="form-control"
							id="password-input"
							name="password"
							value="<?php echo( isset( $_POST[ "password" ] ) ? $_POST[ "password" ] : '' ); ?>"
							required
						>
					</div>

					<div class="p-2">
						<span class="text-danger">* Must be 3-30 characters long, must only contain letters</span>
						<br>
						<span class="text-danger">** Must be 10-30 characters long, must only contain letters</span>
					</div>

					<div class="d-flex justify-content-center mt-5">
						<input type="submit" class="btn btn-primary" value="Submit">
					</div>
				</form>
			</section>
		</main>

		<footer class="container-fluid bg-light fixed-bottom">
			<nav class='navbar navbar-expand justify-content-center'>
				<ul class='navbar-nav mr-auto'>
					<li class='nav-item active'>
						<a class='nav-link' href='about_us.php'>About Us</a>
					</li>
				</ul>
			</nav>
		</footer>
	</body>
</html>