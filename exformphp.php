<?php

$conn = $pdo->open();




try {



    if ($stmt) {
        $_SESSION['success'] = 'สำเร็จ';
    } else {
        $_SESSION['error'] = 'ไม่สำเร็จ';
    }
} catch (PDOException $e) {
    $_SESSION['error'] = $e->getMessage();
}

$pdo->close();

header('location: index.php?tab=8');



if (!$errors) {

}else{ 		
    $_SESSION['error'] =  implode("<br>",$errors);
    echo "<script>window.history.back()</script>";  
}
