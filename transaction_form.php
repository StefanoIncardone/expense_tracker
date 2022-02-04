<?php

session_start();

require "php/scripts/connectToDatabase.php";

require "php/scripts/transactionVariables.php";
require "php/scripts/accountTransactions.php";

?>

<!DOCTYPE html>

<html lang="en-us">
	<head>
		<title>My Account Page</title>

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
		<header class='container-fluid bg-light fixed-top'>
			<nav class='navbar navbar-expand justify-content-center'>
				<ul class='navbar-nav mr-auto'>
					<li class='nav-item active'>
						<a class='nav-link' href='my_account.php'>Back</a>
					</li>
				</ul>
			</nav>
		</header>

		<main class="container-fluid my-5">
			<section class="row justify-content-center">
				<form
					class="col-8 pt-5 pb-5"
					id="transaction-form"
					method="POST"
					action="<?php echo( htmlspecialchars( $_SERVER[ "PHP_SELF" ] ) ); ?>"
				>
					<div class="form-group p-2">
						<input
							type="number"
							placeholder="Recipient ID"
							min="1"
							class="form-control"
							id="recipient-input"
							name="recipientId"
							value="<?php echo( $_POST[ "recipientId" ] ); ?>"
							required
						>

						<span class="text-danger"><?php echo( $recipientIdErrMsg ); ?></span>
					</div>

					<div class="form-group p-2">
						<input
							type="number"
							placeholder="Amount"
							min="1"
							max="1000"
							class="form-control"
							id="amount-input"
							name="amount"
							value="<?php echo( $_POST[ "amount" ] ); ?>"
							required
						>

						<span class="text-danger"><?php echo( $amountErrMsg ); ?></span>
					</div>

					<div class="form-group p-2">
						<input
							type="text"
							placeholder="Message *"
							minlength="0" 
							maxlength="100"
							class="form-control"
							id="message-input"
							name="message"
							value="<?php echo( $_POST[ "message" ] ); ?>"
						>

						<span class="text-danger"><?php echo( $messageLengthErrMsg ); ?></span>
					</div>

					<span class="text-danger p-2">* Optional, Must be under 100 characters long</span>

					<div class="form-group row justify-content-center p-2">
						<input type="submit" class="col-auto btn btn-primary" value="Submit">
					</div>

					<span class="row justify-content-center text-success"><?php echo( $excecutionMessage ); ?></span>
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