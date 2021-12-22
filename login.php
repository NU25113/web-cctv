<?php include 'include/session.php'; ?>
<?php

$conn = $pdo->open();

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    try {

        $stmt = $conn->prepare("SELECT * FROM users WHERE user_firstname = :user_firstname ");
        $stmt->execute(['user_firstname' => $username]);
        $row = $stmt->fetch();
        $count = $stmt->rowCount();
        if ($count > 0) {
            if ($row['user_level']) {
                // if ($row['user_status']) {
                    if (password_verify($password, $row['user_pass'])) {
                    // if ($password == $row['user_pass']) {
                        $_SESSION['user_id'] = $row['user_id'];
                        // $_SESSION['firstname'] = $row['firstname'];
                    } else {
                        $_SESSION['error'] = 'รหัสผ่านผิดพลาด';
                        // $_SESSION['error'] =  implode("<br>",['Apple', 'Banana']);
                    }
                } else {
                    $_SESSION['error'] = 'บัญชีไม่ได้เปิดใช้งาน';
                }
            // } else {
            //     $_SESSION['error'] = 'บัญชียังไม่ได้รับอนุญาต';
            // }
        } else {
            $_SESSION['error'] = 'ไม่พบผู้ใช้นี้';
        }
    } catch (PDOException $e) {
        // echo "มีปัญหาบางอย่างในการเชื่อมต่อ: " . $e->getMessage();
        $_SESSION['error'] = "มีปัญหาบางอย่างในการเชื่อมต่อ: " . $e->getMessage();
    }
    // } else {
    // 	$_SESSION['error'] = 'ใส่ข้อมูลให้ครบก่อน เข้าสู่ระบบก่อน';
}

$pdo->close();


if (isset($_SESSION['user_id'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>เข้าสู่ระบบ</title>
    <link rel="icon" type="image/x-icon" href="../static/main/images/MKMlogo.png" >

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="../static/main/css/bootstrap.min.css">
    <link rel="stylesheet" href="../static/main/css/jquery-ui.css">
    <link rel="stylesheet" href="../static/main/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../static/main/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../static/main/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="../static/main/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="../static/main/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="../static/main/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="../static/main/css/aos.css">
    <link href="../static/admin/css/admin.css" rel="stylesheet">
    <link href="../static/main/css/style.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../static/main/css/style.css"> -->


</head>

<body class="hold-transition login-page bg">
<body class="bg-gradient-warning">
   <div class="site-blocks-cover overlay" style="background-image: url(../static/main/images/original.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="row justify-content-center mb-4">
                        <!-- <div class="col-md-8 text-center">
                            <h1>MAHA      <span class="typed-words"></span></h1>
                            <p class="lead mb-5">เทศบาลเมือง<a href="http://mkm.go.th/web/" target="_blank">มหาสารคาม</a></p>
                            
                        </div> -->
                        </div>
                
            <div class="row justify-content-center mb-4">
            <div class="col-md-8 text-center">
                            <h1>MAHA      <span class="typed-words"></span></h1>
                            <p class="lead mb-5">เทศบาลเมือง<a href="http://mkm.go.th/web/" target="_blank">มหาสารคาม</a></p>
                            
                        </div>
                        
            <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div href="index.html"  class="col-lg-6 d-none d-lg-block bg-login-image">
                            <a href="index.html" >
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                            <div class="text-center">
                                    <h5 class="h5 text-gray-900 mb-4">เจ้าหน้าที่ดูแลระบบ</h5>
                                </div>
                                <form class="user" action method="post">
                                    <div class="form-group">
                                        <input type="username" class="form-control form-control-user"  name="username"
                                            id="exampleInputText" aria-describedby="textHelp"
                                            placeholder="ชื่อผู้ใช้" onkeypress="return chspace()" >
                                    </div>
                                    <div class="form-group">
                                        
                                        <input type="password" class="form-control form-control-user" name="password"
                                            id="exampleInputPassword" placeholder="รหัสผ่าน" onkeypress="return chspace()" >
                                    </div>
                                    <div class="form-group text-left" style="position: relative;cursor:pointer ;">  
                                        <div class="custom-control custom-checkbox small"> 
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">จำรหัสผ่าน</label>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group ">
                                        <!-- <div class="h5 col-md-12">
                                            <input href="index.html" type="submit" value="LOGIN" class="btn btn-primary btn-md text-white">
                                        </div>-->
                                        <div class="h5 col-md-12">
                                                <button type="submit" name="login" value="boychawin" class="btn btn-bright btn-md text-white">เข้าสู่ระบบ</button>
                                    </div>
                                    </div>

                                </form>
                                <hr>
                                <div class="text-center text-bright">
                                    <a class="small" href="../templates/forgot-password.html">ลืมรหัสผ่าน?</a>
                                </div>

                                
                                                    <!-- <div class="h5 col-md-12">
                                                        <a class="btn btn-black" href="../pages/index.php">กลับไปหน้าแรก</a>
                                                    </div> -->
                                                </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        <!-- <div class="border-top pt-5">
                        <p>
                            
                            <center> <label class="tal">ติดต่อปัญหาโดยตรง : </label> 063-9506086</center>
                            
                        </p>
                    </div></center> -->
                
            </div> 
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- jQuery -->
    <script src="../static/admin/vendor/jquery/jquery.min.js"></script>
    <script src="../static/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../static/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../static/admin/js/admin.js"></script>


    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-full-width",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "15000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    </script>

    <script src="../static/main/js/jquery-3.3.1.min.js"></script>
    <script src="../static/main/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="../static/main/js/jquery-ui.js"></script>
    <script src="../static/main/js/popper.min.js"></script>
    <script src="../static/main/js/bootstrap.min.js"></script>
    <script src="../static/main/js/owl.carousel.min.js"></script>
    <script src="../static/main/js/jquery.stellar.min.js"></script>
    <script src="../static/main/js/jquery.countdown.min.js"></script>
    <script src="../static/main/js/bootstrap-datepicker.min.js"></script>
    <script src="../static/main/js/jquery.easing.1.3.js"></script>
    <script src="../static/main/js/aos.js"></script>
    <script src="../static/main/js/jquery.fancybox.min.js"></script>
    <script src="../static/main/js/jquery.sticky.js"></script>

    <script src="../static/main/js/typed.js"></script>
    <script>
        var typed = new Typed('.typed-words', {
            strings: [" SARAKHAM", "", " "],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true
        });
    </script>

    <script src="../static/main/js/main.js"></script>

    <script>
        // ห้ามมีการเว้นวรรค
        function chspace() {
            if (event.keyCode == 32)
                return false;

            return true;
        }
    </script>

</body>

</html>

    