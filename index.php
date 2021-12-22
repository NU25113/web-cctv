<?php

?>
<?php include 'include/session.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เทศบาลเมือง มหาสารคาม</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:url" content="./jobManager/pages/index" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="JOB-MANAGERS" />
    <meta property="og:description" content="JOB-MANAGERS" />
    <meta property="og:image" content="https://i.imgur.com/688JdCQ.png" />
    <meta name="keywords" content="JOB-MANAGERS">
    <meta name="propeller" content="36ac1415f9eb6cc8b69b9ee62158eab1">

    <?php
    include "include/head.php";
    ?>

</head>
<!-- sidebar-collapse -->

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
    <div class="wrapper">
            <?php if (isset($session)) { ?>
                <?php
                include "./include/navbar.php";
                include "./include/sidebar.php";
                // include "./include/header.php";
                ?>
            <?php     } else { ?>
               
            <?php } ?>

            

      

        <?php
        // ================================ส่วนทั่วไป================================================= //

        if (isset($_GET['tab']) && $_GET['tab'] == 1) {
            include "100_emergency.php";
        } elseif (isset($_GET['tab']) && $_GET['tab'] == 2) {
            include "2_work_time_row.php";
        } elseif (isset($_GET['tab']) && $_GET['tab'] == 3) {
            include "3_work_time_report.php";
        } elseif (isset($_GET['tab']) && $_GET['tab'] == 4) {
            include "4_work_time_report_row.php";
        } elseif (isset($_GET['tab']) && $_GET['tab'] == 5) {
            include "5_borrow_car.php";
        } elseif (isset($_GET['tab']) && $_GET['tab'] == 6) {
            include "6_borrow_car_row.php";
        } elseif (isset($_GET['tab']) && $_GET['tab'] == 7) {
            include "7_borrow_opencv.php";
        } elseif (isset($_GET['tab']) && $_GET['tab'] == 8) {
            include "8_borrow_opencv_detail.php";
        } elseif (isset($_GET['tab']) && $_GET['tab'] == 9) {
            include "9_return_car.php";
        } elseif (isset($_GET['tab']) && $_GET['tab'] == 10) {
            include "10_return_car_row.php";
        } elseif (isset($_GET['tab']) && $_GET['tab'] == 11) {
            include "11_return_opencv.php";
        } elseif (isset($_GET['tab']) && $_GET['tab'] == 12) {

            include "12_return_opencv_row.php";
            include "12_return_opencv_detail.php";

        } elseif (isset($_GET['tab']) && $_GET['tab'] == 13) {
            include "13_borrow_car_report.php";
        } elseif (isset($_GET['tab']) && $_GET['tab'] == 14) {
            include "14_return_car_report.php";


// ======================================================================================================


        } elseif (isset($_GET['tab']) && isset($session) && $_GET['tab'] == 101) {
            include "101_users.php";
        } elseif (isset($_GET['tab']) && isset($session) && $_GET['tab'] == 102) {
            include "102_users_row.php";
        } elseif (isset($_GET['tab']) && isset($session) && $_GET['tab'] == 102) {
            include "";
        } elseif (isset($_GET['tab']) && isset($session) && $_GET['tab'] == 103) {
            include "";
        } elseif (isset($_GET['tab']) && isset($session) && $_GET['tab'] == 104) {
            include "";
        } elseif (isset($_GET['tab']) && isset($session) && $_GET['tab'] == 105) {
            include "";
        } elseif (isset($_GET['tab']) && isset($session) && $_GET['tab'] == 106) {
            include "";
        } elseif (isset($_GET['tab']) && isset($session) && $_GET['tab'] == 106) {
            include "";
        } elseif (isset($_GET['tab']) && isset($session) && $_GET['tab'] == 106) {
            include "";
        } elseif (isset($_GET['tab']) && isset($session) && $_GET['tab'] == 109) {
            include "";



            // ================================================================================= //
        } else { ?>
            <?php if (isset($session)) { ?>
                <?php include("0_dashboard_backend.php"); ?>
            <?php     } else { ?>
                <?php include("0_page_index.php"); ?>
            <?php } ?>
        <?php } ?>
        <?php
        include "include/footer.php";
        ?>
        <aside class="control-sidebar control-sidebar-dark">

        </aside>
    </div>

    <?php
    include "include/scripts.php";
    ?>
    
</body>

</html>