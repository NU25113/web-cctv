<!-- เพิ่ม  -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">เพิ่มข้อมูล</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="102_users_row.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <hr>
                        <hr>
                        <div class="h5 col-md-7 mt-3">
                            <label class="text-center">รหัสประจำตัวประชาชน<font color="red"> * </font></label>
                            <input type="text" name="user_card_id" onkeypress="return chspace()" id="uname" class="form-control text-black" required placeholder="กรอก รหัสประจำตัวประชาชน">
                        </div>
                        <hr>
                        <div class="col-lg-7 mt-3">
                            <label class="text-center" for="email">Email<font color="red"> * </font></label>
                            <input type="email" name="user_email" id="email" class="form-control text-black" required placeholder="กรอก Email">
                        </div>
                        <hr>
                        <div class="col-md-6 mt-3">
                            <label class="text-black" for="fname">ชื่อ<font color="red"> * </font></label>
                            <input type="text" id="fname" name="user_firstname" class="form-control text-black" required placeholder="กรอก ชื่อ">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="text-black" for="lname">นามสกุล<font color="red"> * </font></label>
                            <input type="text" id="lname" name="user_lastname" class="form-control text-black" required placeholder="กรอก นามสกุล">
                        </div>
                        <div class="col-lg-6 mt-3 ">
                            <label>รูป <font color="red"> * </font>
                            </label>
                            <div class="mb-3">
                                <div class="form-group text-center" style="position: relative;cursor:pointer ;">
                                    <img src="../img/add5.png" onClick="triggerClick()" id="image_display" style="width: 23%;">
                                    <div class="mt-2">
                                        <input type="file" required name="user_image" onChange="displayImage(this)" class="form-control form-control-border text-black" id="formFileLg">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-7 mt-3">
                            <label>จังหวัด<font color="red"> * </font></label>
                            <select class="custom-select form-control-border text-black" name="user_prov" required="">
                                <option value="0">-- เลือกจังหวัด --</option>
                                <option value="10">กรุงเทพมหานคร</option>
                                <option value="11">สมุทรปราการ</option>
                                <option value="12">นนทบุรี</option>
                                <option value="13">ปทุมธานี</option>
                                <option value="14">พระนครศรีอยุธยา</option>
                                <option value="15">อ่างทอง</option>
                                <option value="16">ลพบุรี</option>
                                <option value="17">สิงห์บุรี</option>
                                <option value="18">ชัยนาท</option>
                                <option value="19">สระบุรี</option>
                                <option value="20">ชลบุรี</option>
                                <option value="21">ระยอง</option>
                                <option value="22">จันทบุรี</option>
                                <option value="23">ตราด</option>
                                <option value="24">ฉะเชิงเทรา</option>
                                <option value="25">ปราจีนบุรี</option>
                                <option value="26">นครนายก</option>
                                <option value="27">สระแก้ว</option>
                                <option value="30">นครราชสีมา</option>
                                <option value="31">บุรีรัมย์</option>
                                <option value="32">สุรินทร์</option>
                                <option value="33">ศรีสะเกษ</option>
                                <option value="34">อุบลราชธานี</option>
                                <option value="35">ยโสธร</option>
                                <option value="36">ชัยภูมิ</option>
                                <option value="37">อำนาจเจริญ</option>
                                <option value="39">หนองบัวลำภู</option>
                                <option value="40">ขอนแก่น</option>
                                <option value="41">อุดรธานี</option>
                                <option value="42">เลย</option>
                                <option value="43">หนองคาย</option>
                                <option value="44">มหาสารคาม</option>
                                <option value="45">ร้อยเอ็ด</option>
                                <option value="46">กาฬสินธุ์</option>
                                <option value="47">สกลนคร</option>
                                <option value="48">นครพนม</option>
                                <option value="49">มุกดาหาร</option>
                                <option value="50">เชียงใหม่</option>
                                <option value="51">ลำพูน</option>
                                <option value="52">ลำปาง</option>
                                <option value="53">อุตรดิตถ์</option>
                                <option value="54">แพร่</option>
                                <option value="55">น่าน</option>
                                <option value="56">พะเยา</option>
                                <option value="57">เชียงราย</option>
                                <option value="58">แม่ฮ่องสอน</option>
                                <option value="60">นครสวรรค์</option>
                                <option value="61">อุทัยธานี</option>
                                <option value="62">กำแพงเพชร</option>
                                <option value="63">ตาก</option>
                                <option value="64">สุโขทัย</option>
                                <option value="65">พิษณุโลก</option>
                                <option value="66">พิจิตร</option>
                                <option value="67">เพชรบูรณ์</option>
                                <option value="70">ราชบุรี</option>
                                <option value="71">กาญจนบุรี</option>
                                <option value="72">สุพรรณบุรี</option>
                                <option value="73">นครปฐม</option>
                                <option value="74">สมุทรสาคร</option>
                                <option value="75">สมุทรสงคราม</option>
                                <option value="76">เพชรบุรี</option>
                                <option value="77">ประจวบคีรีขันธ์</option>
                                <option value="80">นครศรีธรรมราช</option>
                                <option value="81">กระบี่</option>
                                <option value="82">พังงา</option>
                                <option value="83">ภูเก็ต</option>
                                <option value="84">สุราษฎร์ธานี</option>
                                <option value="85">ระนอง</option>
                                <option value="86">ชุมพร</option>
                                <option value="90">สงขลา</option>
                                <option value="91">สตูล</option>
                                <option value="92">ตรัง</option>
                                <option value="93">พัทลุง</option>
                                <option value="94">ปัตตานี</option>
                                <option value="95">ยะลา</option>
                                <option value="96">นราธิวาส</option>
                                <option value="97">บึงกาฬ</option>
                                <!-- <option value="2">ผู้จัดการศูนย์</option> -->
                            </select>
                        </div>
                        <div class="col-lg-7 mt-3">
                            <label class="text-center" for="text">ID อำเภอ<font color="red"> * </font></label>
                            <input type="text" id="text" name="user_dis" class="form-control text-black" required placeholder="กรอก อำเภอ">
                        </div>
                        <div class="col-lg-7 mt-3">
                            <label class="text-center" for="text">ID ตำบล<font color="red"> * </font></label>
                            <input type="text" id="text" name="user_sub" class="form-control text-black" required placeholder="กรอก ตำบล">
                        </div>
                        <div class="col-lg-7 mt-3">
                            <label class="text-center" for="text">ที่อยู่<font color="red"> * </font></label>
                            <textarea name="user_address" id="message" cols="30" rows="7" class="form-control text-black" placeholder="กรอก ที่อยู่.."></textarea>
                        </div>
                        <div class="col-lg-7 mt-3">
                            <label>Status<font color="red"> * </font></label>
                            <select class="custom-select form-control-border text-black" name="user_status" required="">
                                <option value="">-- เลือกระดับ --</option>
                                <option value="1">Active</option>
                                <option value="0">ไม่ Active</option>
                            </select>
                        </div>
                        <div class="col-lg-7 mt-3">
                            <label>Level<font color="red"> * </font></label>
                            <select class="custom-select form-control-border text-black" name="user_level" required="">
                                <option value="">-- เลือกระดับ --</option>
                                <option value="1">ผู้ดูแลระบบ</option>
                                <option value="2">ผู้ใช้</option>
                            </select>
                        </div>

                        <div class="h5 col-md-12">
                        </div>
                        <div class="col-lg-6 mt-2">
                            <button type="submit" name="save_data" value="boychawin" class="btn btn-success btn-md text-white">
                                <i class="fas fa-plus-circle"></i>บันทึก
                            </button>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <button type="submit" data-dismiss="modal" class="btn btn-black btn-md text-white">
                                <i class="fas fa-minus-circle"></i>ปิด
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- แก้ไข -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">แก้ไขข้อมูล</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="102_users_row.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-2 mt-2">
                            <label>รหัสประจำตัวประชาชน <font color="red"> * </font></label>
                            <input type="text" readonly value="" name="user_id" id="user_id" onkeypress="return chspace()" class="form-control text-black" required>
                        </div>
                        <div class="col-lg-7 mt-2">
                            <label>รหัสประจำตัวประชาชน <font color="red"> * </font></label>
                            <input type="text" readonly value="" name="user_card_id" id="user_card_id" onkeypress="return chspace()" class="form-control text-black" required>
                        </div>
                        <div class="col-lg-7 mt-3">
                            <label>Email <font color="red"> * </font>
                            </label>
                            <input type="email" name="user_email" id="user_email" value="" class="form-control text-black" required>
                        </div>
                        <div class="col-lg-7 mt-3">
                            <label>Password <font color="red"> * </font>
                            </label>
                            <input type="password" name="user_pass" id="user_pass" value="" onkeypress="return chspace()" class="form-control text-black" required>
                        </div>

                        <div class="col-lg-6 mt-3">
                            <label>ชื่อ <font color="red"> * </font>
                            </label>
                            <input type="text" name="user_firstname" id="user_firstname" value="" class="form-control text-black" required>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <label>นามสกุล <font color="red"> * </font>
                            </label>
                            <input type="text" name="user_lastname" id="user_lastname" value="" class="form-control text-black" required>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <label>รูป <font color="red"> * </font>
                            </label>
                            <div class="mb-3">
                                <div class="form-group text-center" style="position: relative;cursor:pointer ;">
                                    <img src="../img/add5.png" onClick="triggerClick()" id="image_display" style="width: 30%;">
                                    <div class="mt-2">
                                        <input type="file" required name="user_image" onChange="displayImage(this)" class="form-control text-black" id="formFileLg">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-7 mt-3">
                            <label>จังหวัด <font color="red"> * </font>
                            </label>
                            <select class="custom-select form-control-border text-black" name="user_prov" id="select_data_prov">
                                <option id="prov_data" value=""></option>

                            </select>
                        </div>
                        <div class="col-lg-7 mt-3">
                            <label class="text-center" for="text">ID อำเภอ<font color="red"> * </font></label>
                            <input type="text" id="user_dis" name="user_dis" value="" class="form-control text-black " required>
                        </div>
                        <div class="col-lg-7 mt-3">
                            <label class="text-center" for="text">ID ตำบล<font color="red"> * </font></label>
                            <input type="text" id="user_sub" name="user_sub" value="" class="form-control text-black" required>
                        </div>
                        <div class="col-lg-7 mt-3">
                            <label class="text-center" for="text">ที่อยู่<font color="red"> * </font></label>
                            <textarea name="user_address" id="user_address" cols="30" rows="7" value="" class="form-control text-black"></textarea>
                        </div>
                        <div class="col-lg-7 mt-4">
                            <label>Status<font color="red"> * </font></label>
                            <select class="custom-select form-control-border text-black" name="user_status">
                                <option id="status_data" value=""></option>
                                <!-- <option value="1">Active</option>
                                <option value="0">ไม่ Active</option> -->
                            </select>
                        </div>
                        <div class="col-lg-7 mt-4">
                            <label>Level<font color="red"> * </font></label>
                            <select class="custom-select form-control-border text-black" name="user_level">
                                <option id="level_data" value="">-- เลือกระดับ --</option>
                                <?php if ($session == 2 || $session == 1) { ?>
                                    <option value="1">ผู้ดูแลระบบ</option>
                                    <option value="2">ผู้ใช้</option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <br>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                    <button name="edit_data" value="boychawin" type="summit" class="btn btn-warning float-right">
                        <i class="fa fa-edit"></i>
                        แก้ไข
                    </button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- ลบ -->
<div class="modal fade" id="delete">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">ลบข้อมูล</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="102_users_row.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" class="user_id" name="user_id" id="user_id">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <b class="del_name"></b>
                            </div>
                        </div>
                    </div><br>
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <button name="datele_data" value="boychawin" type="summit" class="btn btn-danger float-right">
                        <i class="fa fa-trash"></i>
                        ลบ
                    </button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>