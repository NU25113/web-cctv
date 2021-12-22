<?php

// print_r($_FILES);
// exit;
include 'include/session.php';
include 'include/slugify.php';
// include 'function/imageResize.php';

$dateTime = date("Y-m-d H:i:s");
//บันทึกข้อมูล
if (isset($_POST['save_data'])) {

	if (isset($_POST['user_name'])) {
		$user_name = $_POST['user_name'];
	} else {
		$errors = 'ใส่รหัสพนักงาน';
	}


	$user_center = $_POST['user_center'];


	$filename = $_FILES['photo']['name'];

	if (isset($_POST['user_firstname'])) {
		$user_firstname = $_POST['user_firstname'];
	} else {
		$errors = 'ใส่ชื่อ';
	}



	if (isset($_POST['user_lastname'])) {
		$user_lastname = $_POST['user_lastname'];
	} else {
		$errors = 'ใส่นามสกุล';
	}

	if (isset($_POST['user_tel'])) {
		$user_tel = $_POST['user_tel'];
	} else {
		$errors = 'ใส่เบอร์';
	}
	if (isset($_POST['user_prov'])) {
		$user_prov = $_POST['user_prov'];
	} else {
		$errors = 'ใส่ข้อมูลให้ครบ';
	}
	if (isset($_POST['user_segment'])) {
		$user_segment = $_POST['user_segment'];
	} else {
		$errors = 'ใส่ข้อมูลให้ครบ';
	}



	if (isset($_POST['user_center'])) {
		$user_center = $_POST['user_center'];
	} else {
		$errors = 'ใส่ข้อมูลให้ครบ';
	}
	if (isset($_POST['user_level'])) {
		$user_level = $_POST['user_level'];
	} else {
		$errors = 'ใส่ข้อมูลให้ครบ';
	}


	// $user_firstname = $_POST['user_firstname'];
	// $user_lastname = $_POST['user_lastname'];
	// $user_pass = $_POST['user_pass'];
	// $user_tel = $_POST['user_tel'];
	// $user_prov = $_POST['user_prov'];
	// $user_center = $_POST['user_center'];
	// $user_level = $_POST['user_level'];

	// $covid_19_name = $_POST['covid_19_name'];
	// $covid_19_name_2 = $_POST['covid_19_name_2'];
	// $covid_19_name_3 = $_POST['covid_19_name_3'];
	$covid_19_image = $_FILES['covid_19_image']['name'];


			$stmt = $conn->prepare("INSERT INTO users (`user_name`, `user_firstname`, `user_lastname`,
                `user_pass`, `user_tel`, `user_center`, `user_prov`, `user_level`,`user_update`,`user_status`) 
                VALUES (:a,:b,:c,:d,:e,:center,:f,:g,:h,:i)");
			$stmt->execute([
				'a' => $slug, 'b' => $user_firstname, 'c' => $user_lastname, 'd' => $user_pass,
				'e' => $user_tel,'center' => $user_center, 'f' => $user_prov, 'g' => $user_level, 'h' => $dateTime, 'i' => '1'
			]);

	if (isset($_POST['covid_19_name'])) {
		$covid_19_name = $_POST['covid_19_name'];
	} else {
		$covid_19_name = '0';
	}
	if (isset($_POST['covid_19_name_2'])) {
		$covid_19_name_2 = $_POST['covid_19_name_2'];
	} else {
		$covid_19_name_2 = '0';
	}
	if (isset($_POST['covid_19_name_3'])) {
		$covid_19_name_3 = $_POST['covid_19_name_3'];
	} else {
		$covid_19_name_3 = '0';
	}


	$filename = $_FILES['photo']['name'];


	if (!$errors) {


		$conn = $pdo->open();


		try {


			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE user_name=:user_name");
			$stmt->execute(['user_name' => $user_name]);
			$row = $stmt->fetch();

			if ($row['numrows'] > 0) {
				$_SESSION['error'] = 'ข้อมูลซ้ำ';
			} else {


				if (isset($covid_19_image)) {

					$extension_covid = pathinfo($covid_19_image, PATHINFO_EXTENSION);
					$new_filename_covid = $user_name . '.' . $extension_covid;
					// $new_filename_covid = $user_name .  date('YmdHi') .'.' . $extension_covid;

					move_uploaded_file($_FILES['covid_19_image']['tmp_name'], 'upload/covid/' . $new_filename_covid);
				} else {
					$new_filename_covid = '0';
				}


				$stmt = $conn->prepare("INSERT INTO users (`user_name`, `user_firstname`, `user_lastname`,
                `user_pass`, `user_tel`, `user_prov`,`user_segment`, `user_center`, `user_level`,`user_update`,`user_status`,
				`covid_19_name`,`covid_19_name_2`,`covid_19_name_3`,`covid_19_image`
				) 
                VALUES (:a,:b,:c,:d,:e,:f,:fs,:fe,:g,:h,:i,:c1,:c2,:c3,:c4)");
				$stmt->execute([
					'a' => $user_name, 'b' => $user_firstname, 'c' => $user_lastname,
					'd' => '123456', 'e' => $user_tel, 'f' => $user_prov, 'fs' => $user_segment, 'fe' => $user_center, 'g' => $user_level, 'h' => $dateTime, 'i' => '1',
					'c1' => $covid_19_name, 'c2' => $covid_19_name_2, 'c3' => $covid_19_name_3, 'c4' => $new_filename_covid
				]);

				$id_json = $conn->lastInsertId();


				if (isset($filename)) {

					$extension = pathinfo($filename, PATHINFO_EXTENSION);
					$new_filename = $id_json . '.' . $extension;
					move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/user/' . $new_filename);

					//update img 
					$stmt = $conn->prepare("UPDATE users SET user_image=:user_image WHERE user_id =:user_id");
					$stmt->execute(['user_image' => $new_filename, 'user_id' => $id_json]);
				}


				$python = `docker exec -i facerdocker_pythonface_1  python /my_app/face_encoding.py $new_filename`;
				echo $python;
			}
		} catch (PDOException $e) {
			$_SESSION['error'] = $e->getMessage();
		}

		try {

			//ถ้าว่ามี  python update images success หรือไม
			$stmt = $conn->prepare("SELECT user_image_json FROM users WHERE user_id =:user_id");
			$stmt->execute(['user_id' => $id_json]);
			$row = $stmt->fetch();

			if (isset($row['user_image_json']) && $row['user_image_json'] != null && $row['user_image_json'] != '') {
				$_SESSION['success'] = 'สำเร็จ';
			} else {

				//  unlink("upload/covid/$new_filename");
				$stmt = $conn->prepare("DELETE FROM users WHERE user_id=:id");
				$stmt->execute(['id' => $id_json]);

				// $_SESSION['success'] = 'สำเร็จ';
				$_SESSION['error'] = 'เพิ่มสมาชิกไม่สำเร็จ';
			}
		} catch (PDOException $e) {
			$_SESSION['error'] = $e->getMessage();
		}


		$pdo->close();
	} else {
		$_SESSION['error'] =  implode("<br>", $errors);
	}

	
} else {
	$_SESSION['error'] = 'ไม่สำเร็จ';
	header('location: index.php?tab=104');
}
