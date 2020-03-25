<!DOCTYPE html>
<html>
<?php
session_start();
$thaiprename = ''; //$_SESSION[1]['thaiprename'];
$firstname = ''; //$_SESSION['first-name'];
$lastname = ''; //$_SESSION['last-name'];
$idcode = ''; //$_SESSION['idcode'];
$typePerson = ''; //$_SESSION['typePerson'];
$mail = ''; //$_SESSION['mail'];
$faculty = ''; //$_SESSION['faculty'];
//echo ("555555555555");
?>

<head>
    <?php include("../../dbConnect.php");
    $sql_TableWaitAccept = "SELECT * FROM `cart`INNER JOIN detail_cart ON cart.id_cart = detail_cart.id_cart
    INNER JOIN user ON user.id_user = cart.id_user
    INNER JOIN equipment ON equipment.id_equipment = detail_cart.id_equipment
    INNER JOIN teacher on teacher.id_teacher = cart.id_teacher
    WHERE cart.status_accept='รอยืนยัน'AND cart.isDelete !=1 AND equipment.isDelete !=1 AND teacher.isDelete != 1";
    $TableWaitAccept = selectData($sql_TableWaitAccept);

    $sql_Tableborrow = "SELECT * FROM `serial_number` INNER JOIN equipment on equipment.id_equipment = serial_number.id_equipment
    INNER JOIN cart ON cart.id_equipment = equipment.id_equipment
    INNER JOIN user ON user.id_user=cart.id_user
    INNER JOIN teacher on teacher.id_teacher = cart.id_teacher
    WHERE serial_number.status NOT LIKE 'ไม่ได้ถูกยืม' AND serial_number.isDelete!=1 AND equipment.isDelete !=1 AND cart.isDelete !=1
    AND teacher.isDelete !=1
    GROUP BY serial_number.id_serial";
    $Tableborrow = selectData($sql_Tableborrow);

    $sql_TableTopBorrow = "SELECT equipment.name_equipment,type_equipment.name_typeEquipment,sum(cart.num_borrow) as totalSum FROM cart 
    INNER JOIN equipment on equipment.id_equipment = cart.id_equipment 
    INNER JOIN type_equipment ON type_equipment.id_typeEquipment = equipment.id_typeEquipment
    WHERE cart.isDelete !=1 & equipment.isDelete!=1
    GROUP BY  equipment.name_equipment  
    ORDER BY `totalSum`  DESC LIMIT 7";
    $TableTopBorrow = selectData($sql_TableTopBorrow);
    ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ระบบยืม-คืนอุปกรณ์ </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include "../view/top-bar.php"; ?>

        <!-- Main Sidebar Container -->
        <?php include "../view/side-bar.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>หน้าแรก</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <?php
                                    $sql_numRequest = "SELECT COUNT(cart.id_cart) as request FROM `cart` WHERE cart.status_accept ='รอยืนยัน' GROUP BY cart.id_cart";
                                    $request = selectDataOne($sql_numRequest);
                                    //print_r($request);
                                    if (is_null($request['request'])){
                                    ?>
                                    <h3>0 อุปกรณ์</h3>
                                    <?php } else { ?>
                                    <h3><?php echo $request['request'] ?> อุปกรณ์</h3>
                                    <?php } ?>
                                    <p>จำนวนอุปกรณ์ที่รอตอบรับ</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a class="small-box-footer"> <i class="fas fa-arrow-circle"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <?php
                                    $sql_numBorrow = "SELECT COUNT(serial_number.id_serial) AS sumborrow FROM `serial_number` WHERE serial_number.status='ยังไม่คืน' || serial_number.status ='รอมารับของ'";
                                    $borrow = selectDataOne($sql_numBorrow);
                                    if (is_null($borrow['sumborrow'])) { ?>
                                    <h3>0 อุปกรณ์</h3>
                                    <?php } else { ?>
                                    <h3><?php echo $borrow['sumborrow'] ?> อุปกรณ์</h3>
                                    <?php } ?>
                                    <p>จำนวนอุปกรณ์ที่กำลังยืม</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a class="small-box-footer"> <i class="fas fa-arrow-circle"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-4">

                        <!-- Profile Image -->

                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="https://www.iconninja.com/files/796/515/578/member-user-account-admin-profile-administrator-male-person-people-human-man-icon.png"
                                        alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">Admin</h3>

                                <p class="text-muted text-center"></p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>ชื่อผู้ใช้งาน</b> <a class="float-right"><?php echo $thaiprename ?>
                                            <?php echo $firstname ?> <?php echo $lastname ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>รหัส</b> <a class="float-right"><?php echo $idcode ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>คณะ</b> <a class="float-right"><?php echo $faculty ?></a>
                                    </li>
                                </ul>

                                <a href="#" class="btn btn-primary btn-block"><b>ดูประวัติการยืม</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">รายการอุปกรณ์ที่ถูกยืมมากที่สุด</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>ชื่ออุปกรณ์</th>
                                                <th>ชื่อหมวดหมู่</th>
                                                <th>จำนวนที่เคยยืมทั้งหมด</th>
                                                <th>status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 0; $i < $TableTopBorrow[0]['numrow']; $i++) {
                                                if ($i + 1 <= 3) {
                                            ?>
                                            <tr>
                                                <td><?php echo $TableTopBorrow[$i + 1]['name_equipment'] ?></td>
                                                <td><?php echo $TableTopBorrow[$i + 1]['name_typeEquipment'] ?></td>
                                                <td>
                                                    <?php echo $TableTopBorrow[$i + 1]['totalSum'] ?>
                                                </td>
                                                <td><span class="badge badge-danger">Hot!!</span></td>
                                            </tr>
                                            <?php } else { ?>

                                            <tr>
                                                <td><?php echo $TableTopBorrow[$i + 1]['name_equipment'] ?></td>
                                                <td><?php echo $TableTopBorrow[$i + 1]['name_typeEquipment'] ?></td>
                                                <td>
                                                    <?php echo $TableTopBorrow[$i + 1]['totalSum'] ?>
                                                </td>
                                                <td> </td>
                                            </tr>
                                            <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->

                            <!-- /.card-footer -->
                        </div>

                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">อุปกรณ์ที่รอตอบรับ</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>ชื่ออุปกรณ์</th>
                                            <th>ชื่อผู้ขอยืม</th>
                                            <th>วันที่ยืม</th>
                                            <th>จำนวน</th>
                                            <th>อาจารย์ที่รับผิดชอบ</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < $TableWaitAccept[0]['numrow']; $i++) { ?>
                                        <tr>
                                            <td><?php echo $TableWaitAccept[$i + 1]['name_equipment'] ?></td>
                                            <td><?php echo $TableWaitAccept[$i + 1]['title'] ?>
                                                <?php echo $TableWaitAccept[$i + 1]['fname'] ?>
                                                <?php echo $TableWaitAccept[$i + 1]['lname'] ?>
                                            </td>
                                            <td><?php echo $TableWaitAccept[$i + 1]['start_borrow'] ?></td>
                                            <td>
                                                <?php echo $TableWaitAccept[$i + 1]['num_borrow'] ?>
                                                อุปกรณ์
                                            </td>
                                            <td>อ.
                                                <?php echo $TableWaitAccept[$i + 1]['Tfname'] ?>
                                                <?php echo $TableWaitAccept[$i + 1]['Tlname'] ?></td>
                                            <td class="td-actions text-center">
                                                <button
                                                    onclick="accept('<?php echo $TableWaitAccept[$i + 1]['id_cart'] ?>','<?php echo $TableWaitAccept[$i + 1]['num_borrow'] ?>')"
                                                    type='button' class="btn btn-black btn-link btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="ยกเลิก"
                                                    onclick="unaccept('<?php echo $TableWaitAccept[$i + 1]['id_cart'] ?>','<?php echo $TableWaitAccept[$i + 1]['num_borrow'] ?>')"
                                                    class="btn btn-black btn-link btn-sm">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ชื่ออุปกรณ์</th>
                                            <th>ชื่อผู้ขอยืม</th>
                                            <th>วันที่ยืม</th>
                                            <th>จำนวน</th>
                                            <th>อาจารย์ที่รับผิดชอบ</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">อุปกรณ์ที่กำลังยืม</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped" id="example3">
                                    <thead>
                                        <tr>
                                            <th>เลขครุภัณฑ์ </th>
                                            <th>ชื่ออุปกรณ์ </th>
                                            <th>ชื่อผู้ขอยืม</th>
                                            <th>วันที่ยืม</th>
                                            <th>วันที่กำหนดวันคืน</th>
                                            <th>อาจารย์ผู้รับผิดชอบ </th>
                                            <th>สถานะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < $Tableborrow[0]['numrow']; $i++) { ?>
                                        <tr>
                                            <td class="sorting_1"><?php echo $Tableborrow[$i + 1]['name_serial'] ?></td>
                                            <td><?php echo $Tableborrow[$i + 1]['name_equipment'] ?></td>
                                            <td><?php echo $Tableborrow[$i + 1]['title'] ?>
                                                <?php echo $Tableborrow[$i + 1]['fname'] ?>
                                                <?php echo $Tableborrow[$i + 1]['lname'] ?></td>
                                            <td><?php echo $Tableborrow[$i + 1]['start_borrow'] ?></td>
                                            <td><?php echo $Tableborrow[$i + 1]['end_borrow'] ?></td>
                                            <td>อ.<?php echo $Tableborrow[$i + 1]['Tfname'] ?>
                                                <?php echo $Tableborrow[$i + 1]['Tlname'] ?></td>
                                            <td class="td-actions text-center">
                                                <?php echo $Tableborrow[$i + 1]['status'] ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>เลขครุภัณฑ์ </th>
                                            <th>ชื่ออุปกรณ์ </th>
                                            <th>ชื่อผู้ขอยืม</th>
                                            <th>วันที่ยืม</th>
                                            <th>วันที่กำหนดวันคืน</th>
                                            <th>อาจารย์ผู้รับผิดชอบ </th>
                                            <th>สถานะ</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include("../view/footer-bar.php"); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="../../plugins/datatables/jquery.dataTables.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- page script -->
    <script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
    $(function() {
        $("#example3").DataTable();
        $('#example4').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });

    function accept(id, num) {
        swal({
                title: "คุณแน่ใจที่จะยืนยันคำขอใช่มั้ย?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Accept",
                closeOnConfirm: false
            },
            function() {
                swal("ยืนยันสำเร็จเรียบร้อยแล้ว", {
                    icon: "success",
                    buttons: false
                });
                accept_1(id, num);
                setTimeout(function() {
                    location.reload();
                }, 1500);
            });
    }

    function accept_1(id1, num1) {
        alert(id1 + " " + num1);
        $.ajax({
            type: "POST",
            data: {
                id: id1,
                num: num1,
                accept: "accept"
            },
            url: "./manage.php",
            async: false,
            success: function(result) {}
        });
    }

    function unaccept(id, num) {
        swal({
                title: "คุณแน่ใจที่จะปฏิเสธคำขอใช่มั้ย?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Accept",
                closeOnConfirm: false
            },
            function() {
                swal("ยืนยันสำเร็จเรียบร้อยแล้ว", {
                    icon: "success",
                    buttons: false
                });
                unaccept_1(id, num);
                setTimeout(function() {
                    location.reload();
                }, 1500);
            });
    }

    function unaccept_1(id1, num1) {
        alert(id1 + " " + num1 + "ยกเลิก");
        $.ajax({
            type: "POST",
            data: {
                id: id1,
                num: num1,
                unaccept: "unaccept"
            },
            url: "./manage.php",
            async: false,
            success: function(result) {}
        });
    }
    </script>
</body>

</html>
