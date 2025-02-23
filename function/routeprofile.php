<?php
if (isset($_GET['action'])) {
	include 'function/profile/edit.php';
	include 'function/profile/update.php';
	include 'function/profile/read.php';
	$action = $_GET['action'];

	switch ($action) {
		case 'edit':
			$email = $_SESSION['email'];
			$row = edit($email);
			break;

		case 'update':
			$request = $_SERVER['REQUEST_METHOD'];
			$email = $_SESSION['email'];
			update($request, $email);
			break;
		
		default:
			$email = $_SESSION['email'];
			$row = read($email);
			break;
	}
} else {
	include 'function/profile/read.php';
	$email = $_SESSION['email'];
	$row = read($email);
}
?>
