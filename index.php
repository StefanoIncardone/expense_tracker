<?php

session_start();

require 'php/scripts/verifiyDatabaseIntegrity.php';

?>

<!DOCTYPE html>

<html lang="en-us">
	<head>
		<title>Expense Tracker</title>

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

		<link rel="stylesheet" href="css/style.css"/>
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