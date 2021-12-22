<!-- เพิ่ม  -->

<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">เพิ่มข้อมูลรถ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="103_car_row.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <label>เลขทะเบียนรถ <font color="red"> * </font>
                            </label>
                            <input type="text" name="car_registration" class="form-control form-control-border" required placeholder="กรอก เลขทะเบียนรถ">
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label>รูปรถ <font color="red"> * </font>
                            </label>
                            <div class="mb-3">
                                <div class="form-group text-center" style="position: relative;cursor:pointer ;">
                                <img src="https://jobm.edoclite.online/jobManagement/img/add1.png" onClick="triggerClick()" id="image_display" style="width: 30%;">
                                    <div class="mt-2">
                                        <!-- <label for="formFileLg" class="form-label">Large file input example</label> -->
                                        <input type="file" required name="photo" onChange="displayImage(this)" id="file_image" class="form-control form-control-border" id="formFileLg" >
                                    </div>
                                </div>
                            </div>
                            <!-- <input type="file" name="photo" class="form-control form-control-border" required placeholder=" รูปรถ"> -->
                        </div>
                        <div class="col-lg-6 mt-2">
                            <label>ประเภทรถ <font color="red"> * </font>
                            </label>

                            <select name="car_cat_id" id="select_data_cat" required class="custom-select form-control-border">
                                <option value="">-เลือก-</option>
                            </select>

                        </div>
                        <div class="col-lg-6 mt-2">
                            <label>จังหวัด <font color="red"> * </font>
                            </label>

                            <select name="car_prov" id="select_data_prov" required class="custom-select form-control-border">
                                <option value="">-เลือก-</option>
                            </select>
                        </div>


                        <!-- <div class="col-lg-12 mt-2">
                            <label>ส่วนงาน <font color="red"> * </font>
                            </label>
                            <select name="cat_prov" id="select_data_prov" required class="custom-select form-control-border">
                                <option value="" selected>-เลือก-</option>
                            </select>
                        </div> -->


                        <div class="col-lg-12 mt-2">
                            <label>ลักษณะ <font color="red"> * </font>
                            </label>
                            <input type="text" name="cat_nature" class="form-control form-control-border" required placeholder="เช่น รถ EXTEND CAB ขับเคลื่อน 4 ล้อ ติดตั้งหลังคาเหล็กหรือหลังคาไฟเบอร์กลาส พร้อมโครงเหล็กพาดบันได">
                        </div>

                        <div class="col-lg-6 mt-2">
                            <label>ยี่ห้อ <font color="red"> * </font>
                            </label>
                            <input type="text" name="cat_brand" class="form-control form-control-border" required placeholder="เช่น TOYOTA">
                        </div>

                        <div class="col-lg-6 mt-2">
                            <label>รุ่น <font color="red"> * </font>
                            </label>
                            <input type="text" name="cat_model" class="form-control form-control-border" required placeholder="เช่น HILUX REVO SMART CAB 2.4 E MT 4 WD">
                        </div>

                        <div class="col-lg-12 mt-2">
                            <label>ผู้ดูแลปัจจุบัน <font color="red"> * </font>
                            </label>
                            <textarea type="text" name="cat_current" class="form-control form-control-border" required placeholder="กรอก ผู้ดูแลปัจจุบัน"></textarea>
                        </div>



                    </div><br>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                    <button name="save_data" value="boychawin" type="summit" class="btn btn-primary float-right">
                        <i class="fas fa-plus-circle"></i>
                        บันทึก
                    </button>
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
                <h4 class="modal-title">แก้ไขข้อมูลรถ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="103_car_row.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" class="bc_id" name="id">
                    <input type="hidden" class="bc_img2" name="bc_img2">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <label>เลขทะเบียนรถ <font color="red"> * </font>
                            </label>

                            <input type="text" name="car_registration" id="bc_name" class="form-control form-control-border" required placeholder="กรอก เลขทะเบียนรถ">
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label>รูปรถ <font color="red"> * </font>
                            </label>
                            <div class="mb-3">
                                <div class="form-group text-center" style="position: relative;cursor:pointer ;">
                                <img alt="ไม่มีรูป" onClick="triggerClick()" id="bc_img" style="width: 30%;">
                                    <div class="mt-2">
                                        <!-- <label for="formFileLg" class="form-label">Large file input example</label> -->
                                        <input type="file" name="photo" onChange="displayImage(this)" class="form-control form-control-border" >
                                    </div>
                                </div>
                            </div>
                            <!-- <input type="text" name="photo" id="bc_img" class="form-control form-control-border" required placeholder=" รูปรถ"> -->
                        </div>
                        <div class="col-lg-6 mt-2">
                            <label>ประเภทรถ <font color="red"> * </font>
                            </label>

                            <select name="car_cat_id" id="select_data_cat2" required class=" custom-select form-control-border">
                                <option selected id="selected_cat"></option>
                            </select>

                        </div>
                        <div class="col-lg-6 mt-2">
                            <label>จังหวัด <font color="red"> * </font>
                            </label>

                            <select name="car_prov" id="select_data_prov2" required class="custom-select form-control-border">
                                <option id="selected_prov" value="">-เลือก-</option>
                            </select>
                        </div>


                        <!-- <div class="col-lg-12 mt-2">
                            <label>ส่วนงาน <font color="red"> * </font>
                            </label>
                            <select name="cat_prov" id="select_data_prov2" required class="custom-select form-control-border">
                                <option  id="cat_prov" value="" selected>-เลือก-</option>
                            </select>
                        </div> -->

                        <div class="col-lg-12 mt-2">
                            <label>ลักษณะ <font color="red"> * </font>
                            </label>
                            <input type="text" name="cat_nature" id="cat_nature" class="form-control form-control-border" required placeholder="เช่น รถ EXTEND CAB ขับเคลื่อน 4 ล้อ ติดตั้งหลังคาเหล็กหรือหลังคาไฟเบอร์กลาส พร้อมโครงเหล็กพาดบันได">
                        </div>

                        <div class="col-lg-6 mt-2">
                            <label>ยี่ห้อ <font color="red"> * </font>
                            </label>
                            <input type="text" name="cat_brand" id="cat_brand" class="form-control form-control-border" required placeholder="เช่น TOYOTA">
                        </div>

                        <div class="col-lg-6 mt-2">
                            <label>รุ่น <font color="red"> * </font>
                            </label>
                            <input type="text" name="cat_model" id="cat_model" class="form-control form-control-border" required placeholder="เช่น HILUX REVO SMART CAB 2.4 E MT 4 WD">
                        </div>


                        <div class="col-lg-12 mt-2">
                            <label>ผู้ดูแลปัจจุบัน <font color="red"> * </font>
                            </label>
                            <textarea type="text" name="cat_current" id="cat_current" class="form-control form-control-border" required placeholder="กรอก ผู้ดูแลปัจจุบัน"></textarea>
                        </div>



                    </div><br>
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
                <h4 class="modal-title">ลบข้อมูลรถ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="103_car_row.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" class="bc_id" name="id">
                    <input type="hidden" class="car_registration" name="car_registration">
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