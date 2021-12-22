<?php
include("./../conn.php");
session_start();
error_reporting(E_ALL);

if (isset($_SESSION['user_id'])) {
	$conn = $pdo->open();


	try {
		///////////////////////////////////////////////////////////
		// $stmt_set = $conn->prepare("SELECT br_user_id,br_id FROM car_borrow_return WHERE br_user_id IS NULL");
		// $stmt_set->execute();
		// $row_ch_null = $stmt_set->fetch();

		// $stmt_del = $conn->prepare("DELETE FROM car_borrow_return WHERE br_id=:br_id");
		// $stmt_del->execute(['br_id' => $row_ch_null['br_id']]);
		///////////////////////////////////////////////////////////

		$stmt = $conn->prepare("SELECT * FROM users 

		WHERE user_id=:id");
		$stmt->execute(['id' => $_SESSION['user_id']]);
		$user = $stmt->fetch();
	} catch (PDOException $e) {
		$_SESSION['error'] = "มีปัญหาบางอย่างในการเชื่อมต่อ: " . $e->getMessage();
	}

	$pdo->close();
}


 	// print_r($user);


//ตัวแปร

$errors = array();
if (isset($user['user_level'])) {
	$session = $user['user_level'];
} else {
	$session = null;
}
