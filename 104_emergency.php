<?php if ($session == 2 || $session == 1 || $session == 4) : ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>จัดการแจ้งเหตุฉุกเฉิน</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item text-info"><a href="./">หน้าหลัก</a></li>
                            <li class="breadcrumb-item active">จัดการแจ้งเหตุฉุกเฉิน</li>
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
                                                    <th>ID</th>
                                                    <th>ตัวเลือกประเภท</th>
                                                    <th>ประเภทการแจ้งเหตุ</th>
                                                    <th>รายละเอียดเหตุการณ์</th>
                                                    <th>ชื่อผู้แจ้ง</th>
                                                    <th>เบอร์ผู้แจ้ง</th>
                                                    <th>ภาพเหตุการณ์</th>
                                                    <th>ละติจูด</th>
                                                    <th>ลองจิจูด</th>
                                                    <th>สถานะการแจ้งเหตุ</th>
                                                    
                                                    <th>ผู้รับแจ้ง</th>
                                                    <th>ID ผู้รับแจ้ง</th>
                                                    <th>ID จังหวัด</th>
                                                    <th>ID APP</th>
                                                    <th>วันที่สร้าง</th>
                                                    <!-- <th>แก้ไข</th> -->
                                                    <th>แก้ไข</th>
                                                    <th>ลบ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $conn = $pdo->open();
                                                $i = 0;
                                                try {
                                                    //////////////////////////////////////////////////////////////////////////////////////////////
                                                    if ($session == 2) {
                                                        $stmt = $conn->prepare("SELECT * FROM `app_emergency`");
                                                        $stmt->execute();
                                                    } else {
                                                        $stmt = $conn->prepare("SELECT * FROM `app_emergency` WHERE em_province ={$user['user_prov']}");
                                                        $stmt->execute();
                                                    }
                                                    ////////////////////////////////////////////////////////////////////////////////////////////////
                                                    foreach ($stmt as $row) {
                                                        $i += 1;
                                                        echo "
													<tr>
                                                    
                                                    <td>" . $row['em_id'] . "</td>
                                                    <td>" . $row['em_category'] . "</td>
                                                    <td>" . $row['em_type'] . "</td>
                                                    <td>" . $row['em_detail'] . "</td>
                                                    <td>" . $row['em_owner'] . "</td>
                                                    <td>" . $row['em_phone'] . "</td>
                                                    <td>" . $row['em_image'] . "</td>
                                                    <td>" . $row['em_lat'] . "</td>
                                                    <td>" . $row['em_lng'] . "</td>
                                                    <td>" . $row['em_status'] . "</td>
                                                    <td>" . $row['em_notified'] . "</td>
                                                    <td>" . $row['em_notifier_user_id'] . "</td>
                                                    <td>" . $row['em_prov'] . "</td>
                                                    <td>" . $row['em_app_id'] . "</td>
                                                    <td>" . $row['em_created_at'] . "</td>

                                                    <td>
														<button class='btn btn-warning edit' data-id='" . $row['em_id'] . "'><i class='fa fa-edit'></i> </button>
													</td>
                                                        <td>
														<button class='btn btn-danger delete' data-id='" . $row['em_id'] . "'><i class='fa fa-trash'></i> </button>
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
                                        <?php if ($session == 0 || $session == 1) { ?>
                                            <a data-bs-target="#addnew" href="#addnew" type="button" data-toggle="modal" data-target="#addnew" class="btn btn-block btn-primary addnew"><i class="fas fa-plus-circle mr-1"></i> เพิ่มสมาชิก</a>
                                        <?php  } ?>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

    <?php include('modal/104_users_modal.php'); ?>
    <script>
        $(function() {

            $(document).on('click', '.addnew', function(e) {
                e.preventDefault();

                // getCategory();
                getProv();
                getCenter();
                getSegment();
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
            $.ajax({
                type: 'POST',
                url: '105_users_row.php',
                data: {
                    id: id,
                    all_data: 'boychawin',
                },
                dataType: 'json',
                success: function(response) {
                    $('.bc_id').val(response.user_id);
                    $('#bc_name').val(response.car_registration);
                    $('#bc_img').attr("src", response.user_image);
                    $('#bc_img2').attr("src", response.user_image);
                    $('.bc_img2').val(response.user_image);
                    $('.bc_img3').val(response.covid_19_image);
                    $('#edit_bc_img').attr("src", 'upload/user/' + response.user_image);

                    $('#user_firstname').val(response.user_firstname);
                    $('#user_lastname').val(response.user_lastname);
                    $('#user_tel').val(response.user_tel);
                    $('#user_name').val(response.user_name);
                    $('#user_pass').val(response.user_pass);
                    $('#user_level').val(response.sn_name_en).html(response.sn_name_th);

                    $('#selected_prov').val(response.code).html(response.name_in_thai);
                    $('#selected_segment').val(response.sm_id).html(response.sm_name);
                    $('#selected_center').val(response.center_id).html(response.center_name);
                    $('.del_name').html(response.user_name);

                    $('#option_covid_19_name').val(response.covid_19_name).html(response.covid_19_name);
                    $('#option_covid_19_name_2').val(response.covid_19_name_2).html(response.covid_19_name_2);
                    $('#option_covid_19_name_3').val(response.covid_19_name_3).html(response.covid_19_name_3);
                    $('#image_display4').attr("src", 'upload/covid/' + response.covid_19_image);
                    // getCategory();
                    getProv();
                    getCenter();
                    getSegment();
                }
            });
        }


        function getProv() {
            $.ajax({
                type: 'POST',
                url: '105_users_row.php',
                data: {
                    select_data_prov: 'boychawin'
                },
                dataType: 'json',
                success: function(response) {


                    $('#select_data_prov').append(response);
                    $('#select_data_prov2').append(response);
                }
            });
        }

        function getSegment() {
            $.ajax({
                type: 'POST',
                url: '105_users_row.php',
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
                url: '105_users_row.php',
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

    <script>
        function triggerClick(e) {
            document.querySelector('#photo').click();
        }

        function displayImage(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('#image_display').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }

        function triggerClick2(e) {
            document.querySelector('#covid_19_image').click();
        }

        function displayImage2(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('#image_display2').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }

        function triggerClick3(e) {
            document.querySelector('#file_image3').click();
        }

        function displayImage3(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('#image_display3').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }

        function triggerClick4(e) {
            document.querySelector('#file_image4').click();
        }

        function displayImage4(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('#image_display4').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>

<?php else :  echo "<script>location.replace('index.php')</script>";
endif; ?>