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

		<script>

			function displayTransactionsTables()
			{
				displayIncomingTransactionsTables();
				displayOutcomingTransactionsTables();
			}

			function displayIncomingTransactionsTables()
			{
				let table = document.getElementById( "incoming-transactions-table" );
				setIncomingTransactionTable( "incoming-ordering-options", table );
			}

			function displayOutcomingTransactionsTables()
			{
				let table = document.getElementById( "outcoming-transactions-table" );
				setOutcomingTransactionTable( "outcoming-ordering-options", table );
			}

			function getSelectedOrderingOption( id )
			{
				let element = document.getElementById( id ).selectedIndex;
				return document.getElementsByTagName( "option" )[ element ].value;
			}

			function setIncomingTransactionTable( tableId, table )
			{
				switch( getSelectedOrderingOption( tableId ) )
				{
					case <?php echo( json_encode( Queries::DROPDOWN_AMOUNT_ASC ) ); ?>:
						table.innerHTML = "<?php echo getIncomingTransactionsTable(
								Queries::AMOUNT_ASC, Queries::DATE_ASC
							);
						?>";
						break;

					case <?php echo( json_encode( Queries::DROPDOWN_AMOUNT_DESC ) ); ?>:
						table.innerHTML = "<?php echo getIncomingTransactionsTable(
								Queries::AMOUNT_DESC, Queries::DATE_ASC
							);
						?>";
						break;

					case <?php echo( json_encode( Queries::DROPDOWN_DATE_ASC ) ); ?>:
						table.innerHTML = "<?php echo getIncomingTransactionsTable(
								Queries::DATE_ASC, Queries::AMOUNT_ASC
							);
						?>";
						break;
						
					case <?php echo( json_encode( Queries::DROPDOWN_DATE_DESC ) ); ?>:
						table.innerHTML = "<?php echo getIncomingTransactionsTable(
								Queries::DATE_DESC, Queries::AMOUNT_ASC
							);
						?>";
						break;
				}
			}

			function setOutcomingTransactionTable( tableId, table )
			{
				switch( getSelectedOrderingOption( tableId ) )
				{
					case <?php echo( json_encode( Queries::DROPDOWN_AMOUNT_ASC ) ); ?>:
						table.innerHTML = "<?php echo getOutcomingTransactionsTable(
								Queries::AMOUNT_ASC, Queries::DATE_ASC
							);
						?>";
						break;

					case <?php echo( json_encode( Queries::DROPDOWN_AMOUNT_DESC ) ); ?>:
						table.innerHTML = "<?php echo getOutcomingTransactionsTable(
								Queries::AMOUNT_DESC, Queries::DATE_ASC
							);
						?>";
						break;

					case <?php echo( json_encode( Queries::DROPDOWN_DATE_ASC ) ); ?>:
						table.innerHTML = "<?php echo getOutcomingTransactionsTable(
								Queries::DATE_ASC, Queries::AMOUNT_ASC
							);
						?>";
						break;
						
					case <?php echo( json_encode( Queries::DROPDOWN_DATE_DESC ) ); ?>:
						table.innerHTML = "<?php echo getOutcomingTransactionsTable(
								Queries::DATE_DESC, Queries::AMOUNT_ASC
							);
						?>";
						break;
				}
			}
		</script>
	</head>

	<body onload="displayTransactionsTables()">
		<header class='container-fluid bg-light fixed-top'>
			<nav class='navbar navbar-expand justify-content-center'>
				<ul class='navbar-nav mr-auto'>
					<li class='nav-item active'>
						<a class='nav-link' href='transaction_form.php'>New Transaction</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link' href='login.php'>Log out</a>
					</li>
				</ul>
			</nav>
		</header>

		<main class="container-fluid my-5">
			<section class="row justify-content-center">
				<label class="row my-3 p-3 border border-primary"><span class="h2 d-flex justify-content-center text-success">Incoming transactions:</span>
					<div class="d-flex justify-content-center">
						<label class="p-3"><span class="h4 p-2">Order by:</span>
							<select
								class="p-2 h6"
								id="incoming-ordering-options"
								name="amountOrderingOptions"
								onchange="displayIncomingTransactionsTables()"
							>
								<?php require "php/html_elements/dropdownOrderingMenu.php"; ?>
							</select>
						</label>
					</div>
					
					<div class="col d-flex justify-content-center" id="incoming-transactions-table"></div>
				</label>

				<label class="row my-3 p-3 border border-primary"><span class="h2 d-flex justify-content-center text-danger">Outcoming transactions:</span>
					<div class="d-flex justify-content-center">
						<label class="p-3"><span class="h4 p-2">Order by:</span>
							<select
								class="p-2 h6"
								id="outcoming-ordering-options"
								name="dateOrderingOptions"
								onchange="displayOutcomingTransactionsTables()"
							>
								<?php require "php/html_elements/dropdownOrderingMenu.php"; ?>
							</select>
						</label>
					</div>

					<div class="col d-flex justify-content-center" id="outcoming-transactions-table"></div>
				</label>
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