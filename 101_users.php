<?php if ($session == 2 || $session == 1 || $session == 4) : ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>จัดการข้อมูลผู้ใช้งาน</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./">หน้าหลัก</a></li>
                            <li class="breadcrumb-item active">จัดการข้อมูลผู้ใช้งาน</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="row">
                            <div class="col-12">

                                <div class="card">

                                    <div class="card-body">

                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <!-- <th>ID</th> -->
                                                    <th>ID APP</th>
                                                    <th>รหัสประจำตัวประชาชน</th>
                                                    <th>E-mail</th>
                                                    <th>ชื่อ</th>
                                                    <th>นามสกุล</th>
                                                    <th>รูป</th>
                                                    <th>ID จังหวัด</th>
                                                    <th>ID อำเภอ</th>
                                                    <th>ID ตำบล</th>
                                                    <th>ที่อยู่</th>
                                                    <th>STATUS</th>
                                                    <th>LEVEL</th>
                                                    <th>วันที่สร้าง</th>
                                                    <th>วันที่ล่าสุด</th>
                                                    <!-- <th>แก้ไข</th> -->
                                                    <th>แก้ไข</th>
                                                    <th>ลบ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once "../response.php";
                                                require_once "../conn.php";
                                                $conn = $pdo->open();
                                                $i = 0;
                                                try {
                                                    //////////////////////////////////////////////////////////////////////////////////////////////
                                                    if ($session == 2) {
                                                        $stmt = $conn->prepare("SELECT * FROM `users` WHERE user_level != '0' ");
                                                        $stmt->execute();
                                                    } elseif ($session == 1) {
                                                        $stmt = $conn->prepare("SELECT * FROM `users` WHERE user_level != '0' AND user_prov ={$user['user_prov']}");
                                                        $stmt->execute();
                                                    } else {
                                                        $stmt = $conn->prepare("SELECT * FROM `users` WHERE user_level != '0' AND user_prov ={$user['user_prov']}
                                                        AND user_id ={$user['user_id']}");
                                                        $stmt->execute();
                                                    }
                                                    ////////////////////////////////////////////////////////////////////////////////////////////////
                                                    foreach ($stmt as $row) {
                                                        $i += 1;
                                                        echo "
                                                    <tr>
                                                        <td>" . $row['user_app_id'] . "</td>
                                                        <td>" . $row['user_card_id'] . "</td>
                                                        <td>" . $row['user_email'] . "</td>
                                                        <td>" . $row['user_firstname'] . "</td>
                                                        <td>" . $row['user_lastname'] . "</td>
                                                        <td>" . $row['user_image'] . "</td>
                                                        <td>" . $row['user_prov'] . "</td>
                                                        <td>" . $row['user_dis'] . "</td>
                                                        <td>" . $row['user_sub'] . "</td>
                                                        <td>" . $row['user_address'] . "</td>
                                                        <td>" . $row['user_status'] . "</td>
                                                        <td>" . $row['user_level'] . "</td>
                                                        <td>" . $row['user_created_at'] . "</td>
                                                        <td>" . $row['user_update_date'] . "</td>
                                                        <td>
														<button class='btn btn-warning edit' data-id='" . $row['user_id'] . "'><i class='fa fa-edit'></i> </button>
														</td>
                                                        <td>
														<button class='btn btn-danger delete' data-id='" . $row['user_id'] . "'><i class='far fa-trash-alt'></i> </button>
														</td>
													</tr>
													";
                                                        // $i++;
                                                    }
                                                } catch (PDOException $e) {
                                                    echo $e->getMessage();
                                                }
                                                $pdo->close();
                                                ?>

                                            </tbody>
                                        </table><br>
                                        <?php if ($session == 2 || $session == 1) { ?>
                                            <a data-bs-target="#addnew" href="#addnew" type="button" data-toggle="modal" data-target="#addnew" class="btn btn-block btn-primary addnew"><i class="fas fa-plus-circle mr-1"></i> เพิ่มผู้ใช้งาน</a>
                                        <?php  } ?>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
    <!-- /.content-wrapper -->


    <?php include('modal/103_users_modal.php'); ?>
    <script>
        $(function() {

            $(document).on('click', '.addnew', function(e) {
                e.preventDefault();

                // getCategory();
                getProv();
                // getCenter();
                // getSegment();
            });


            $(document).on('click', '.edit', function(e) {
                e.preventDefault();
                $('#edit').modal('show');
                var id = $(this).data('id');
                getData(id);


            });

            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                $('#delete').modal('show');
                var id = $(this).data('id');

                getData(id);
            });


            $("#addnew").on("hidden.bs.modal", function() {
                $('.append_items').remove();
            });

            $("#edit").on("hidden.bs.modal", function() {
                $('.append_items').remove();
            });


            $("#delete").on("hidden.bs.modal", function() {
                $('.append_items').remove();
            });


        });

        function getData(id) {
            // console.log(id);
            $.ajax({
                type: 'POST',
                url: 'user_data.php',
                data: {
                    id: id,
                    user_show: 'nani',
                },
                dataType: 'json',
                success: function(response) {
                    $('#user_id').val(response.user_id);
                    $('#user_card_id').val(response.user_card_id);
                    // console.log(response);
                    $('#user_email').val(response.user_email);
                    $('#user_pass').val(response.user_pass);
                    $('#user_firstname').val(response.user_firstname);
                    $('#user_lastname').val(response.user_lastname);                    // $('#user_image').attr("src", 'uploads/user/' + response.user_image);
                    $('#user_image').val(response.user_image);
                    $('#prov_data').val(response.user_prov).html(response.user_prov);
                    $('#user_dis').val(response.user_dis);
                    $('#user_sub').val(response.user_sub);
                    $('#user_address').val(response.user_address);
                    $('#status_data').val(response.user_status).html(response.user_status);
                    $('#user_level').val(response.user_level).html(response.user_level);
                    
                    // getCategory();
                    getProv();
                    // getCenter();
                    // getSegment();
                }
            });
        }


        function getProv() {
            $.ajax({
                type: 'POST',
                url: '102_users_row.php',
                data: {
                    select_data_prov: 'boychawin'
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $('#select_data_prov').append(response);
                    $('#select_data_prov2').append(response);
                }
            });
        }

        function getSegment() {
            $.ajax({
                type: 'POST',
                url: '102_users_row.php',
                data: {
                    select_data_segment: 'boychawin'
                },
                dataType: 'json',
                success: function(response) {

                    $('#select_data_segment').append(response);
                    $('#select_data_segment2').append(response);

                }
            });
        }


        function getCenter() {
            $.ajax({
                type: 'POST',
                url: '102_users_row.php',
                data: {
                    select_data_center: 'boychawin'
                },
                dataType: 'json',
                success: function(response) {

                    $('#select_data_center').append(response);
                    $('#select_data_center2').append(response);

                }
            });
        }
    </script>






<?php else :  echo "<script>location.replace('index.php')</script>";
endif; ?>