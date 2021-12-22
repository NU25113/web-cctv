<?php
$conn = $pdo->open();

try {


  //////////////////////////////////////////////////////////////////////////////////////////////
  if ($session == 0) {
    //นับจำนวนประเภท
    $stmt = $conn->prepare("SELECT COUNT(cat_id) as num FROM `car_category`");
    $stmt->execute();
    $rowCount_Cat = $stmt->fetch();
    //จำนวนรถ
    $stmt = $conn->prepare("SELECT COUNT(car_id) as num FROM `car`");
    $stmt->execute();
    $rowCount_Car = $stmt->fetch();
    //จำนวนสมาชิก
    $stmt = $conn->prepare("SELECT COUNT(user_id) as num FROM `users`");
    $stmt->execute();
    $rowCount_User = $stmt->fetch();
    //รายงานลงเวลาทำงาน
    $stmt = $conn->prepare("SELECT COUNT(br_id) as num FROM `car_borrow_return` ");
    $stmt->execute();
    $rowCount_T = $stmt->fetch();
    //รายงานการยืม
    $stmt = $conn->prepare("SELECT COUNT(br_id) as num FROM `car_borrow_return`");
    $stmt->execute();
    $rowCount_BR = $stmt->fetch();

} else {


        //นับจำนวนประเภท
        $stmt = $conn->prepare("SELECT COUNT(cat_id) as num FROM `car_category` WHERE cat_prov ={$user['user_prov']}");
        $stmt->execute();
        $rowCount_Cat = $stmt->fetch();
        //จำนวนรถ
        $stmt = $conn->prepare("SELECT COUNT(car_id) as num FROM `car` WHERE car_prov ={$user['user_prov']}");
        $stmt->execute();
        $rowCount_Car = $stmt->fetch();
        //จำนวนสมาชิก
        $stmt = $conn->prepare("SELECT COUNT(user_id) as num FROM `users` WHERE user_prov ={$user['user_prov']}");
        $stmt->execute();
        $rowCount_User = $stmt->fetch();
        //รายงานลงเวลาทำงาน
        $stmt = $conn->prepare("SELECT COUNT(br_id) as num FROM `car_borrow_return`  WHERE br_prov ={$user['user_prov']} AND br_status ='B'");
        $stmt->execute();
        $rowCount_T = $stmt->fetch();
        //รายงานการยืม
        $stmt = $conn->prepare("SELECT COUNT(br_id) as num FROM `car_borrow_return`WHERE br_prov ={$user['user_prov']} AND br_status ='R'");
        $stmt->execute();
        $rowCount_BR = $stmt->fetch();


}

////////////////////////////////////////////////////////////////////////////////////////////////


      

} catch (PDOException $e) {
    $_SESSION['error'] = "มีปัญหาบางอย่างในการเชื่อมต่อ: " . $e->getMessage();
}
$pdo->close();
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h4 class="m-0">ส่วนควบคุม
                    </h4>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    

    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                        <div class="row">
                        
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link text-white">
                                <i class="fas fa-home"></i> หน้าหลัก</a>
                        </li> -->


                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-back-800">3</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-friends fa-2x text-back-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                                                <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">แจ้งเหตุฉุกเฉิน
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">152</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-exclamation-triangle fa-2x text-back-300"></i>
                                                                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">ร้องเรียน
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bullhorn fa-2x text-warning-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="h3 mb-2 text-gray-800">ตาราง แจ้งเหตุฉุกเฉิน</h1>

                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardSos" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="collapseCardSos">
                            <h6 class="m-0 font-weight-bold text-primary">แจ้งเหตุฉุกเฉิน</h6>
                        </a>
                        <div class="collapse show" id="collapseCardSos">
                        <!-- Card Content - Collapse -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ประเภทการแจ้งเหตุ</th>
                                                    <th>รายละเอียดเหตุการณ์</th>
                                                    <th>ชื่อผู้แจ้ง</th>
                                                    <th>เบอร์โทร</th>
                                                    <th>ภาพประกอบ</th>
                                                    <th>ที่อยู่</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ประเภทการแจ้งเหตุ</th>
                                                    <th>รายละเอียดเหตุการณ์</th>
                                                    <th>ชื่อผู้แจ้ง</th>
                                                    <th>เบอร์โทร</th>
                                                    <th>ภาพประกอบ</th>
                                                    <th>ที่อยู่</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>63</td>
                                                    <td>2011/07/25</td>
                                                    <td>$170,750</td>
                                                </tr>
                                            
                                                <tr>
                                                    <td>Lael Greer</td>
                                                    <td>Systems Administrator</td>
                                                    <td>London</td>
                                                    <td>21</td>
                                                    <td>2009/02/27</td>
                                                    <td>$103,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Jonas Alexander</td>
                                                    <td>Developer</td>
                                                    <td>San Francisco</td>
                                                    <td>30</td>
                                                    <td>2010/07/14</td>
                                                    <td>$86,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Shad Decker</td>
                                                    <td>Regional Director</td>
                                                    <td>Edinburgh</td>
                                                    <td>51</td>
                                                    <td>2008/11/13</td>
                                                    <td>$183,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Michael Bruce</td>
                                                    <td>Javascript Developer</td>
                                                    <td>Singapore</td>
                                                    <td>29</td>
                                                    <td>2011/06/27</td>
                                                    <td>$183,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Donna Snider</td>
                                                    <td>Customer Support</td>
                                                    <td>New York</td>
                                                    <td>27</td>
                                                    <td>2011/01/25</td>
                                                    <td>$112,000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <h1 class="h3 mb-2 text-gray-800">ตาราง ร้องเรียน</h1>
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardAppeal" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="collapseCardAppeal">
                            <h6 class="m-0 font-weight-bold text-primary">ร้องเรียน</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardAppeal">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ประเภทการแจ้งเหตุ</th>
                                                    <th>รายละเอียดเหตุการณ์</th>
                                                    <th>ชื่อผู้แจ้ง</th>
                                                    <th>เบอร์โทร</th>
                                                    <th>ภาพประกอบ</th>
                                                    <th>ที่อยู่</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ประเภทการแจ้งเหตุ</th>
                                                    <th>รายละเอียดเหตุการณ์</th>
                                                    <th>ชื่อผู้แจ้ง</th>
                                                    <th>เบอร์โทร</th>
                                                    <th>ภาพประกอบ</th>
                                                    <th>ที่อยู่</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>63</td>
                                                    <td>2011/07/25</td>
                                                    <td>$170,750</td>
                                                </tr>
                                            
                                                <tr>
                                                    <td>Lael Greer</td>
                                                    <td>Systems Administrator</td>
                                                    <td>London</td>
                                                    <td>21</td>
                                                    <td>2009/02/27</td>
                                                    <td>$103,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Jonas Alexander</td>
                                                    <td>Developer</td>
                                                    <td>San Francisco</td>
                                                    <td>30</td>
                                                    <td>2010/07/14</td>
                                                    <td>$86,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Shad Decker</td>
                                                    <td>Regional Director</td>
                                                    <td>Edinburgh</td>
                                                    <td>51</td>
                                                    <td>2008/11/13</td>
                                                    <td>$183,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Michael Bruce</td>
                                                    <td>Javascript Developer</td>
                                                    <td>Singapore</td>
                                                    <td>29</td>
                                                    <td>2011/06/27</td>
                                                    <td>$183,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Donna Snider</td>
                                                    <td>Customer Support</td>
                                                    <td>New York</td>
                                                    <td>27</td>
                                                    <td>2011/01/25</td>
                                                    <td>$112,000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                    </div>
                            <div class="row">
                                <div class="col-lg-4 col-6">
                                    <!-- small box -->
                                    <!-- <div class="small-box bg-success ">

                                        <div class="inner">
                                            <h3><?php echo htmlentities($rowCount_Cat['num']); ?></h3>
                                            <p>จำนวนประเภทรถ</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-users" aria-hidden="true"></i>

                                        </div>
                                        <a href="index.php?tab=100" class="small-box-footer"><i class="fas fa-users"></i></a>
                                    </div>
                                </div> -->

                                <!-- ./col -->
                                <div class="col-lg-4 col-6">
                                    <!-- small box -->
                                    <!-- <div class="small-box bg-warning ">
                                        <div class="inner">
                                            <h3><?php echo htmlentities($rowCount_Car['num']); ?></h3>
                                            <p>จำนวนรถ</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-city" aria-hidden="true"></i>
                                        </div>
                                        <a href="index.php?tab=102" class="small-box-footer"><i class="fas fa-city"></i></a>
                                    </div> -->
                                </div>

                                <!-- ./col -->
                                <div class="col-lg-4 col-6">
                                    <!-- small box -->
                                    <!-- <div class="small-box bg-info ">

                                        <div class="inner">
                                            <h3><?php echo htmlentities($rowCount_User['num']); ?></h3>
                                            <p>จำนวนสมาชิก</p>
                                        </div>
                                        <div class="icon">

                                            <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                                        </div>
                                        <a href="index.php?tab=104" class="small-box-footer"><i class="fas fa-map-marker-alt"></i></a>
                                    </div> -->
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-6 col-6">
                                    <!-- small box -->
                                    <!-- <div class="small-box bg-pink ">
                                        <div class="inner">
                                            <h3><?php echo htmlentities($rowCount_T['num']); ?></h3>
                                            <p>รายงานการยืม</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                        <a href="index.php?tab=106" class="small-box-footer"> <i class="fa fa-list-alt"></i></a>
                                    </div> -->
                                </div>
                                <div class="col-lg-6 col-6">
                                    <!-- small box -->
                                    <!-- <div class="small-box bg-pink ">
                                        <div class="inner">
                                            <h3><?php echo htmlentities($rowCount_BR['num']); ?></h3>
                                            <p>รายงานการคืนรถ</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                        <a href="index.php?tab=108" class="small-box-footer"> <i class="fa fa-list-alt"></i></a>
                                    </div> -->
                                </div>
                                <!-- ./col -->
                            </div>
                            <div class="row">
                                <!-- /.col 6-->
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>