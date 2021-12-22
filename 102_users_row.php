<?php
// print_r($_POST);
// exit;
// $errorlevel=error_reporting();
// error_reporting($errorlevel & ~E_NOTICE);
include 'include/session.php';
include 'include/slugify.php';
// include 'function/imageResize.php';
if (isset($_POST['data_show'])) {
	$id = $_POST['id'];

	$conn = $pdo->open();
	$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
	$stmt->execute(['id' => $id]);
	$data = $stmt->fetch();

	$pdo->close();
	echo json_encode($data);
}


$dateTime = date("Y-m-d H:i:s");
//บันทึกข้อมูล
if (isset($_POST['save_data'])) {


	if (isset($_POST['user_card_id'])) {
		$user_card_id = $_POST['user_card_id'];
	} else {
		$errors[] = 'ใส่รหัสประจำตัวประชาชน';
	}
	if (isset($_POST['user_email'])) {
		$user_email = $_POST['user_email'];
	} else {
		$errors[] = 'ใส่ Email';
	}
	if (isset($_POST['user_firstname'])) {
		$user_firstname = $_POST['user_firstname'];
	} else {
		$errors[] = 'ใส่ชื่อ';
	}
	if (isset($_POST['user_lastname'])) {
		$user_lastname = $_POST['user_lastname'];
	} else {
		$errors[] = 'ใส่นามสกุล';
	}
	$filename = $_FILES['user_image']['name'];

	if (isset($_POST['user_prov'])) {
		$user_prov = $_POST['user_prov'];
	} else {
		$errors[] = 'ใส่ข้อมูลจังหวัดให้ครบ';
	}
	if (isset($_POST['user_dis'])) {
		$user_dis = $_POST['user_dis'];
	} else {
		$errors[] = 'ใส่ ID อำเภอ ให้ครบ';
	}
	if (isset($_POST['user_sub'])) {
		$user_sub = $_POST['user_sub'];
	} else {
		$errors[] = 'ใส่ ID ตำบล ให้ครบ';
	}
	if (isset($_POST['user_address'])) {
		$user_address = $_POST['user_address'];
	} else {
		$errors[] = 'ใส่ ที่อยู่ ให้ครบ';
	}
	if (isset($_POST['user_status'])) {
		$user_status = $_POST['user_status'];
	} else {
		$errors[] = 'ใส่ Status ให้ครบ';
	}

	if (isset($_POST['user_level'])) {
		$user_level = $_POST['user_level'];
	} else {
		$errors[] = 'ใส่ Level ให้ครบ';
	}

	$user_card_id = $_POST['user_card_id'];
	$user_email = $_POST['user_email'];
	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$user_image = $_POST['user_image'];
	$user_prov = $_POST['user_prov'];
	$user_dis = $_POST['user_dis'];
	$user_sub = $_POST['user_sub'];
	$user_address = $_POST['user_address'];
	$user_status = $_POST['user_status'];
	$user_level = $_POST['user_level'];

	// $stmt = $conn->prepare("INSERT INTO users (`user_card_id`,`user_email`, `user_firstname`, `user_lastname`,
	//     `user_image`, `user_prov`, `user_dis`, `user_sub`, `user_address`,`user_status`,`user_level`,`user_created_at`,`user_update_date`) 
	//     VALUES (:a,:b,:c,:d,:e,:center,:f,:g,:h,:i)");
	// $stmt->execute([
	// 	'a' => $slug, 'b' => $user_firstname, 'c' => $user_lastname, 'd' => $user_pass,
	// 	'e' => $user_tel,'center' => $user_center, 'f' => $user_prov, 'g' => $user_level, 'h' => $dateTime, 'i' => '1'
	// ]);


	if (!$errors) {

		$conn = $pdo->open();
		try {

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE user_firstname=:user_firstname");
			$stmt->execute(['user_firstname' => $user_firstname]);
			$row = $stmt->fetch();

			if ($row['numrows'] > 0) {
				$_SESSION['error'] = 'ข้อมูลซ้ำ';
			} else {

				if (isset($user_image)) {

					$extension_user = pathinfo($user_image, PATHINFO_EXTENSION);
					$new_filename_user = $user_firstname . '.' . $extension_user;


					move_uploaded_file($_FILES['user_image']['tmp_name'], 'uploads/users/' . $new_filename_user);
				} else {
					$new_filename_user = '0';
				}

				$stmt10 = $conn->prepare("INSERT INTO `users`(
				`user_app_id`,
				`user_card_id`,
				`user_email`,
				`user_pass`,
				`user_token`,
				`user_firstname`,
				`user_lastname`, 
				`user_image`,
				`user_prov`,
				`user_dis`,
				`user_sub`,
				`user_address`,
				`user_status`,
				`user_level`) 
				
                VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n)");
				$stmt10->execute([
					'a' => null,
					'b' => $user_card_id,
					'c' => $user_email,
					'd' => '123456',
					'e' => '0000',
					'f' => $user_firstname,
					'g' => $user_lastname,
					'h' => $user_image,
					'i' => $user_prov,
					'j' => $user_dis,
					'k' => $user_sub,
					'l' => $user_address,
					'm' => $user_status,
					'n' => $user_level
				]);

				// $id_json = $conn->lastInsertId();


				// if (isset($filename)) {
				// 	$extension = pathinfo($filename, PATHINFO_EXTENSION);
				// 	$new_filename = $id_json . '.' . $extension;
				// 	move_uploaded_file($_FILES['user_image']['tmp_name'], 'uploads/users/' . $new_filename);

				// 	//update img 
				// 	$stmt = $conn->prepare("UPDATE users SET user_image=:user_image WHERE user_id =:user_id");
				// 	$stmt->execute(['user_image' => $new_filename, 'user_id' => $id_json]);
				// }
			}
			if (isset($stmt10)) {
				$_SESSION['success'] = 'สำเร็จ';
			} else {
				$_SESSION['error'] = 'ไม่สำเร็จ';
			}
		} catch (PDOException $e) {
			$_SESSION['error'] = $e->getMessage();
		}
		$pdo->close();
	} else {
		$_SESSION['error'] =  implode("<br>", $errors);
	}

	header('location: index.php?tab=101');
	// } else {
	// 	$_SESSION['error'] = 'ไม่สำเร็จ';
	// 	header('location: index.php?tab=101');
	// }


} elseif (isset($_POST['edit_data'])) {
	//แก้ไข
	$uesr_id = $_POST['uesr_id'];
	$user_card_id = $_POST['user_card_id'];
	$user_email = $_POST['user_email'];
	$user_pass = $_POST['user_pass'];
	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$filename = $_FILES['user_image']['name'];
	$user_prov = $_POST['user_prov'];
	$user_dis = $_POST['user_dis'];
	$user_sub = $_POST['user_sub'];
	$user_address = $_POST['user_address'];
	$user_status = $_POST['user_status'];
	$user_level = $_POST['user_level'];


	$conn = $pdo->open();


	try {

		$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE user_firstname=:user_firstname");
		$stmt->execute(['user_firstname' => $user_firstname]);
		$row = $stmt->fetch();


		if ($row['numrows'] > 1) {
			$_SESSION['error'] = 'ข้อมูลซ้ำ';
		} else {


			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE user_image=:user_image");
			$stmt->execute(['user_image' => $user_image]);
			$row = $stmt->fetch();

			if ($row['numrows'] > 0 && $filename == null) {
				$new_filename = $user_image;
			} else {

				if (!empty($filename)) {

					$extension = pathinfo($filename, PATHINFO_EXTENSION);
					$new_filename = $id . '.' . $extension;
					move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/user/' . $new_filename);
				} else {
					$new_filename = '';
				}
			}
			// UPDATE `users` SET `user_id`='[value-1]',`user_app_id`='[value-2]',`user_card_id`='[value-3]',`user_email`='[value-4]',
			// `user_pass`='[value-5]',`user_token`='[value-6]',`user_token_date`='[value-7]',`user_firstname`='[value-8]',
			// `user_lastname`='[value-9]',`user_image`='[value-10]',`user_prov`='[value-11]',`user_dis`='[value-12]',`user_sub`='[value-13]',
			// `user_address`='[value-14]',`user_status`='[value-15]',`user_level`='[value-16]',`user_created_at`='[value-17]',
			// `user_update_date`='[value-18]' WHERE 1

			$stmt = $conn->prepare("UPDATE `users` SET `user_email`=:user_email,
						`user_pass`=:user_pass,
						`user_firstname`=:user_firstname,
						`user_lastname`=:user_lastname,
						`user_image`=:user_image,
						`user_prov`=:user_prov,
						`user_dis`=:user_dis,
						`user_sub`=:user_sub,
						`user_address`=:user_address,
						`user_status`=:user_status,
						`user_level`=:user_level
						WHERE `user_id`=:user_id");
			$stmt->execute([
				'user_email' => $user_email,
				'user_pass' => $user_pass,
				'user_firstname' => $user_firstname,
				'user_lastname' => $user_lastname,
				'user_image' => $user_image,
				'user_prov' => $user_prov,
				'user_dis' => $user_dis,
				'user_sub' => $user_sub,
				'user_address' => $user_address,
				'user_status' => $user_status,
				'user_level' => $user_level,
				'user_id' => $user_id
			]);

			if ($stmt) {
				$_SESSION['success'] = 'สำเร็จ';
			} else {
				$_SESSION['error'] = 'ไม่สำเร็จ';
			}
		}
	} catch (PDOException $e) {
		$_SESSION['error'] = $e->getMessage();
	}



	$pdo->close();
	header('location: index.php?tab=101');
} elseif (isset($_POST['datele_data'])) {
	//ลบ


	$user_id = $_POST['user_id'];

	// $user_card_id = $_POST['user_card_id'];
	// $user_email = $_POST['user_email'];
	// $user_pass = $_POST['user_pass'];
	// $user_firstname = $_POST['user_firstname'];
	// $user_lastname = $_POST['user_lastname'];
	// $filename = $_FILES['user_image']['name'];
	// $user_prov = $_POST['user_prov'];
	// $user_dis = $_POST['user_dis'];
	// $user_sub = $_POST['user_sub'];
	// $user_address = $_POST['user_address'];
	// $user_status = $_POST['user_status'];
	// $user_level = $_POST['user_level'];
	$conn = $pdo->open();

	try {

		$stmt = $conn->prepare("DELETE FROM `users` WHERE `user_id`=:user_id");
		$stmt->execute(['user_id' => $user_id]);
		$_SESSION['success'] = 'successfully';

		if (isset($stmt)) {
			$_SESSION['success'] = 'สำเร็จ';
		} else {
			$_SESSION['error'] = 'ไม่สำเร็จ';
		}
	} catch (PDOException $e) {
		$_SESSION['error'] = $e->getMessage();
	}


	$pdo->close();

	header('location: index.php?tab=101');
} elseif (isset($_POST['all_data'])) {
	//ส่งข้อมูลไปแสดง

	if (isset($_POST['user_id'])) {
		$user_id = $_POST['user_id'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM users 
		-- LEFT JOIN provinces
		-- ON users.user_prov=provinces.code
		-- LEFT JOIN service_center
		-- ON users.user_center=service_center.center_id
		-- LEFT JOIN status_name
		-- ON users.user_level=status_name.sn_name_en
		WHERE  user_id=:user_id");
		$stmt->execute(['user_id' => $user_id]);
		$data = $stmt->fetch();

		$pdo->close();

		echo json_encode($data);
	}
} elseif (isset($_POST['select_data_prov'])) {
	//ข้อมูลแส้งเป็น select

	$output = '';

	$conn = $pdo->open();


	try {
		if ($session == 2) {
			$stmt = $conn->prepare("SELECT * FROM `provinces` WHERE active ='1'");
			$stmt->execute();
		} else {
			$stmt = $conn->prepare("SELECT * FROM `provinces` WHERE active ='1' AND code={$user['user_prov']}");
			$stmt->execute();
		}
		foreach ($stmt as $row) {
			$output .= "
				<option value='" . $row['code'] . "' class='append_items'>" . $row['name_th'] . "</option>
			";
		}
	} catch (PDOException $e) {
		$_SESSION['error'] = $e->getMessage();
	}


	$pdo->close();
	echo json_encode($output);
} elseif (isset($_POST['select_data_segment'])) {
	//ข้อมูลแส้งเป็น select

	$output = '';

	$conn = $pdo->open();


	try {
		if ($session == 0) {
			$stmt = $conn->prepare("SELECT * FROM `car_segment` ");
			$stmt->execute();
		} else {
			$stmt = $conn->prepare("SELECT * FROM `car_segment` WHERE sm_prov={$user['user_prov']}");
			$stmt->execute();
		}
		foreach ($stmt as $row) {
			$output .= "
				<option value='" . $row['sm_id'] . "' class='append_items'>" . $row['sm_name'] . "</option>
			";
		}
	} catch (PDOException $e) {
		$_SESSION['error'] = $e->getMessage();
	}


	$pdo->close();
	echo json_encode($output);
} elseif (isset($_POST['select_data_center'])) {
	//ข้อมูลแส้งเป็น select

	$output = '';

	$conn = $pdo->open();


	try {

		$stmt = $conn->prepare("SELECT * FROM `service_center` ");
		$stmt->execute();

		foreach ($stmt as $row) {
			$output .= "
				<option value='" . $row['center_id'] . "' class='append_items'>" . $row['center_name'] . "</option>
			";
		}
	} catch (PDOException $e) {
		$_SESSION['error'] = $e->getMessage();
	}




	$pdo->close();
	echo json_encode($output);
} elseif (isset($_GET['get_id_center'])) {
	//ข้อมูลแส้งเป็น select


	$output = array();

	$conn = $pdo->open();


	$stmt = $conn->prepare("SELECT * FROM service_center WHERE center_prov={$_GET['get_id_center']}");
	$stmt->execute();


	foreach ($stmt as $row) {
		array_push($output, $row);
	}
	$pdo->close();
	echo json_encode($output);
} else {
	$_SESSION['error'] = 'ไม่สำเร็จ';
	header('location: index.php?tab=104');
}
