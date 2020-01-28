<?php
	if(!isset($_GET['invoice'])){
		header('Location: index.php');
		exit();
	}

	$pdo = new PDO('sqlite:chinook.db');
	$sql = '
		SELECT *
		FROM invoice_items
		WHERE InvoiceId = ?';

	$statement = $pdo->prepare($sql);
	$statement->bindparam(1, $_GET('invoice'));
	$statement->execute();
	$invoices = $statement->fetchAll(PDO::FETCH_OBJ);
