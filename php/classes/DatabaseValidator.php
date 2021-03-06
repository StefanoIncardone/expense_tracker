<?php declare( strict_types=1 );

// this file is meant for debugging, DELETE BEFORE SUBMISSION

require "Database.php";

abstract class DatabaseValidator implements Database
{
	private static array $_DATABASE_COMMANDS = array
	(
		"CREATE DATABASE IF NOT EXISTS `".Database::DATABASE_NAME."`"
	);

	private static array $_TABLE_COMMANDS = array
	(
		"CREATE TABLE IF NOT EXISTS `".Database::TABLE_ACCOUNTS."`
		(
			id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			firstname VARCHAR(20) NOT NULL,
			lastname VARCHAR(20) NOT NULL,
			email VARCHAR(60) NOT NULL,
			password VARCHAR(20) NOT NULL,
			balance INT(9) DEFAULT 1000,
			registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
		)",

		"CREATE TABLE IF NOT EXISTS `".Database::TABLE_TRANSACTIONS."`
		(
			transaction_id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			sender_id INT(9) UNSIGNED NOT NULL,
			recipient_id INT(9) UNSIGNED NOT NULL,
			amount INT(9) UNSIGNED NOT NULL,
			excecution_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			message VARCHAR(100),

			CONSTRAINT FK_sender_id FOREIGN KEY (sender_id) REFERENCES Accounts(id),
			CONSTRAINT FK_recipient_id FOREIGN KEY (recipient_id) REFERENCES Accounts(id)
		)"
	);

	private static array $_INSERT_COMMANDS = array
	(
		"INSERT IGNORE INTO ".Database::TABLE_ACCOUNTS." (id, firstname, lastname, email, password)
		VALUES (1, 'ajeje', 'brazorf', 'ajeje.brazorf@patagarro.com', 'passwordAjeje')",

		"INSERT IGNORE INTO ".Database::TABLE_ACCOUNTS." (id, firstname, lastname, email, password)
		VALUES (2, 'brambilla', 'fumagalli', 'brambilla.fumagalli@patagarro.com', 'passwordBrambilla')",

		"INSERT IGNORE INTO ".Database::TABLE_ACCOUNTS." (id, firstname, lastname, email, password)
		VALUES (3, 'pdor', 'kmer', 'pdor.kmer@patagarro.com', 'passwordPdor')",


		"INSERT IGNORE INTO ".Database::TABLE_TRANSACTIONS." (transaction_id, sender_id, recipient_id, amount, message)
		VALUES (4, 1, 2, 69, 'transaction 1 to 2 of €69')",

		"INSERT IGNORE INTO ".Database::TABLE_TRANSACTIONS." (transaction_id, sender_id, recipient_id, amount, message)
		VALUES (5, 1, 3, 71, 'transaction 1 to 2 of €71')",

		"INSERT IGNORE INTO ".Database::TABLE_TRANSACTIONS." (transaction_id, sender_id, recipient_id, amount, message)
		VALUES (6, 1, 2, 89, 'transaction 1 to 2 of €89')",

		"INSERT IGNORE INTO ".Database::TABLE_TRANSACTIONS." (transaction_id, sender_id, recipient_id, amount, message)
		VALUES (7, 2, 1, 31, 'transaction 1 to 2 of €31')",

		"INSERT IGNORE INTO ".Database::TABLE_TRANSACTIONS." (transaction_id, sender_id, recipient_id, amount, message)
		VALUES (8, 3, 1, 19, 'transaction 1 to 2 of €19')",

		"INSERT IGNORE INTO ".Database::TABLE_TRANSACTIONS." (transaction_id, sender_id, recipient_id, amount, message)
		VALUES (9, 3, 1, 15, 'transaction 1 to 2 of €15')",

		"INSERT IGNORE INTO ".Database::TABLE_TRANSACTIONS." (transaction_id, sender_id, recipient_id, amount, message)
		VALUES (10, 2, 1, 18, 'transaction 1 to 2 of €18')",

		"INSERT IGNORE INTO ".Database::TABLE_TRANSACTIONS." (transaction_id, sender_id, recipient_id, amount, message)
		VALUES (11, 1, 2, 36, 'transaction 1 to 2 of €36')",

		"INSERT IGNORE INTO ".Database::TABLE_TRANSACTIONS." (transaction_id, sender_id, recipient_id, amount, message)
		VALUES (12, 2, 3, 138, 'transaction 2 to 3 of €138')",

		"INSERT IGNORE INTO ".Database::TABLE_TRANSACTIONS." (transaction_id, sender_id, recipient_id, amount, message)
		VALUES (13, 3, 1, 420, 'transaction 3 to 1 of €420')"
	);

	public static function verifyIntegrity() : void
	{
		$connection = self::connectToDatabase( Database::LOCALHOST );
		self::executeCommands( $connection, self::$_DATABASE_COMMANDS );

		$connection = self::connectToDatabase( Database::LOCALHOST.";dbname=".Database::DATABASE_NAME );
		self::executeCommands( $connection, self::$_TABLE_COMMANDS );
		self::executeCommands( $connection, self::$_INSERT_COMMANDS );
	}

	private static function connectToDatabase( String $database ) : PDO
	{
		try
		{
			$connection = new PDO( $database, Database::ROOT );
			$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			return $connection;
		}
		catch( PDOException $e )
		{
			echo( $e->getMessage()."<br>" );
		}
	}

	private static function executeCommands( PDO &$connection, array $commands ) : void
	{
		foreach( $commands as $command )
		{
			try
			{
				self::queryDatabase( $connection, $command );
			}
			catch( PDOException $e )
			{
				echo( $e->getMessage()."<br>" );
			}
		}
	}

	private static function queryDatabase( PDO &$connection, String $query, array $options = [] ) : void
	{
		$statement = $connection->prepare( $query, $options );
		$statement->execute();
	}
}

?>