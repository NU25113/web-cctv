<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ข้อมูลจังหวัด</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">จังหวัด</li>
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

                            <!-- ใส่เนื้อตรงนี้ -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->



<?php 

if (!isset($_SESSION['user_level']) && $_SESSION['user_level'] == '') {
    echo "<script>location.href = 'index.php';</script>";
} else {}
?>


<?php if (isset($_SESSION['user_level']) !== '') {} ?>

<?php if ($UL == 2)?>
<?php if ($UL == 0) {?>

<?php if ($UL==2 || $UL==3 || $UL==4 ) {?> 
    <?php } ?>
<?php if ($UL == 0 || $UL == 1|| $UL==2 || $UL==3 || $UL==4 ) {?> 

<?php } ?>


<?php if($UL == 0 ){ @header('Location: index'); exit; } ?>

<?php if ($UL == 2 || $UL == 3 || $UL == 4) : ?> 

    <?php if ($UL == 0 ) : ?> 
    <?php endif;?>
    <?php else:   echo "<script>window.location = 'index?tab=404'</script>";  endif; ?>