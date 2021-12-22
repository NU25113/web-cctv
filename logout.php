
<?php
	session_start();
	session_destroy();
	unset($_SESSION['bc_user_id']);
	$_SESSION['error']="ออกจากระบบแล้ว";
	header('location: index.php');
?>

