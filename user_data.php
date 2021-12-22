<?php 
	include 'include/session.php';

	if(isset($_POST['user_show'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();
		$stmt = $conn->prepare("SELECT * FROM users WHERE user_id=:id");
		$stmt->execute(['id'=>$id]);
		$data = $stmt->fetch();
		
		$pdo->close();
		echo json_encode($data);
	}
?>