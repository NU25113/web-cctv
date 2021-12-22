<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-white bg-white elevation-4 ">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image"> <img src="../static/main/images/MKMlogo.png" class="img-circle"></div>
            <div class="info">
                <a href="./" class="d-block text-white"><?php if (isset($user['user_firstname'])) {
                                                            echo $user['user_firstname'];
                                                        } ?>
                    <h6 style="font-size: 0.8rem"><?php if (isset($user['name_in_thai'])) {
                                                        echo "(" . $user['name_in_thai'] . ")";
                                                    } ?></h6>
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar bg-white" type="search" placeholder="ค้นหา" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-dark">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="./" class="nav-link text-info">
                        <i class="nav-icon fas fa-home"> </i>
                        <p> หน้าหลัก </p>
                    </a>
                </li>

                <?php if (isset($session)) { ?>


                    <?php if ($session == '0') { ?>
                        <li class="nav-item ">
                            <a href="index.php?tab=" class="nav-link text-white">

                                <i class="nav-icon fas fa-car"></i>
                                <p> จัดการข้อมูลรถ <i class="right fas fa-angle-left"></i> </p>

                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="index.php?tab=102" class="nav-link text-white">
                                        <i class="nav-icon fas fa-car"> </i>
                                        <p> จัดการรถ </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="index.php?tab=100" class="nav-link text-white">
                                        <i class="nav-icon fas fa-cogs nav-icon"> </i>
                                        <p> ประเภทรถ </p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                    <?php } ?>

                    <?php if ($session == '1') { ?>
                        <li class="nav-item">
                            <a href="index.php?tab=102" class="nav-link text-white">
                                <i class="nav-icon fas fa-car"> </i>
                                <p> จัดการรถ </p>
                            </a>
                        </li>

                    <?php } ?>

                    <?php if ($session == '0') { ?>
                        <li class="nav-item">
                            <a href="index.php?tab=19" class="nav-link text-white">
                                <i class="nav-icon fas fa-map-marker-alt"> </i>
                                <p> จังหวัด </p>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($session == '0' || $session == '1') { ?>
                        <li class="nav-item">
                            <a href="index.php?tab=20" class="nav-link text-white">
                                <i class="nav-icon fa fa-city"> </i>
                                <p> จัดการศูนย์ </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?tab=104" class="nav-link text-white">
                                <i class="nav-icon fas fa-users"> </i>
                                <p> สมาชิก </p>
                            </a>
                        </li>
                    <?php } ?>


                    <?php if ($session == '4') { ?>

                        <li class="nav-item">
                            <a href="index.php?tab=100" class="nav-link text-white">
                                <i class="nav-icon fas fa-users"> </i>
                                <p> จัดการข้อมูลส่วนตัว </p>
                            </a>
                        </li>
                    <?php } ?>


                    <?php if ($session != '0' && $session != '1') { ?>

                        <!-- <li class="nav-item">
                            <a href="index.php?tab=100" class="nav-link text-black">
                            <button type="button" class="btn btn-info btn-circle btn-xl"> <i class="fas fa-exclamation-triangle"></i>
                            </button>
                               
                                <p> แจ้งเหตุฯ / ร้องเรียน </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?tab=100" class="nav-link text-black">
                            <button type="button" class="btn btn-info btn-circle btn-xl">  <i class="far fa-building"></i>
                            </button>
                               
                            <p> เทศบาล/เมือง </p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="index.php?tab=100" class="nav-link text-black">
                                <i class="fas fa-exclamation-triangle"></i>
                                <p> แจ้งเหตุฯ / ร้องเรียน </p>
                            </a>
                        </li> 
                        <li class="nav-item  ">
                            <a href="index.php?tab=" class="nav-link " style="color: #3b5998;">
                                <i class="far fa-building"></i>
                                <p> เทศบาล/เมือง </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?tab=" class="nav-link text-black">
                                <i class="fas fa-map-marked-alt"></i>
                                <p> สถานที่สำคัญ </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?tab=104" class="nav-link text-black">
                                <i class="far fa-calendar-alt"></i>
                                <p> ปฎิทินอบรม </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?tab=" class="nav-link text-black">
                                <i class="fas fa-video"></i>
                                <p> CCTV </p>
                            </a>
                        </li>

                        <!-- <li class="nav-item">
                            <a href="index.php?tab=101" class="nav-link text-black">
                            <i class="fas fa-bullhorn"></i>
                                <p> ร้องเรียน </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?tab=102" class="nav-link text-black">
                            <i class="fas fa-phone-alt"></i>
                                <p> สายด่วน </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?tab=103" class="nav-link text-black">
                            <i class="fas fa-newspaper"></i>
                                <p> ข่าวสาร </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?tab=104" class="nav-link text-black">
                            <i class="far fa-calendar-alt"></i>
                                <p> ปฎิทินอบรม </p>
                            </a>
                        </li>-->
                        <li class="nav-item">
                            <a href="index.php?tab=105" class="nav-link text-black">
                                <i class="fas fa-trophy"></i>
                                <p>รางวัลที่ได้รับ </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?tab=105" class="nav-link text-black">
                                <i class="fas fa-info-circle"></i>
                                <p>คู่มือ</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="index.php?tab=" class="nav-link text-black">
                            <i class="fas fa-video"></i>
                                <p> CCTV </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?tab=" class="nav-link text-black">
                            <i class="fab fa-youtube"></i>
                                <p> YOUTUBE </p>
                            </a>
                        </li> -->

                    <?php } ?>


                    <li class="nav-item">
                        <a href="logout.php" class="nav-link text-info">
                            <i class=" nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                ออกจากระบบ
                            </p>
                        </a>
                    </li>

                <?php } else {
                    include('sidebar_frontend.php');
                }
                ?>
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>