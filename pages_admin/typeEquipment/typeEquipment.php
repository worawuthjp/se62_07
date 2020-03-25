<!DOCTYPE html>
<html>
<?php session_start();
?>

<head>
    <?php include("../../dbConnect.php");
    $sql_Type = "SELECT type_equipment.id_typeEquipment,type_equipment.name_typeEquipment,coalesce(numE, 0) as numE FROM (SELECT equipment.id_typeEquipment,equipment.name_equipment,COUNT(equipment.id_equipment) AS numE FROM equipment WHERE equipment.isDelete=0 GROUP BY equipment.id_typeEquipment) AS T1 RIGHT JOIN type_equipment ON type_equipment.id_typeEquipment=T1.id_typeEquipment WHERE type_equipment.isDelete=0";
    $TableType = selectData($sql_Type)
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css.map">
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
                            <h1>หมวดหมู่อุปกรณ์</h1>
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
                                    $sql_num = "SELECT COUNT(type_equipment.id_typeEquipment) as numType FROM type_equipment WHERE type_equipment.isDelete = 0";
                                    $numT = selectDataOne($sql_num);
                                    //print_r($request);
                                    if (is_null($numT['numType'])) {
                                    ?>
                                        <h3>0 หมวด</h3>
                                    <?php } else { ?>
                                        <h3> </h3>
                                        <h3><?php echo $numT['numType'] ?> หมวด</h3>
                                    <?php } ?>
                                    <p>จำนวนหมวดหมู่ทั้งหมด</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a class="small-box-footer"> <i class="fas fa-arrow-circle"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6" style="cursor:pointer;" id="add">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3></h3>
                                    <h3> +1</h3>
                                    <p>เพิ่มหมวดหมู่อุปกรณ์</p>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">หมวดหมู่อุปกรณ์</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>หมวดหมู่</th>
                                            <th>จำนวน</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < $TableType[0]['numrow']; $i++) { ?>
                                            <tr role="row" class="odd">
                                                <td><?php echo $TableType[$i + 1]['name_typeEquipment'] ?></td>
                                                <td><?php echo $TableType[$i + 1]['numE'] ?></td>
                                                <td style="text-align:center;">
                                                    <a href="#" class="EditType" id_typeEquipment=<?php echo $TableType[$i + 1]['id_typeEquipment'] ?> name_typeEquipment=<?php echo $TableType[$i + 1]['name_typeEquipment'] ?>>
                                                        <button type="button" class="btn btn-warning  btn-sm" 4 data-toggle="tooltip" title="แก้ไขข้อมูล">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    <?php if ($TableType[$i + 1]['numE'] == 0) { ?>
                                                        <button type="button" onclick="delfunction('<?php echo $TableType[$i + 1]['id_typeEquipment'] ?>','<?php echo $TableType[$i + 1]['name_typeEquipment'] ?>')" class="btn btn-danger btn-sm btndel" data-toggle="tooltip" title="" data-original-title="ลบหมวดหมู่"><i class="far fa-trash-alt"></i></button>
                                                    <?php } else { ?>
                                                        <button type="button" onclick="delfunction2('<?php echo $TableType[$i + 1]['id_typeEquipment'] ?>','<?php echo $TableType[$i + 1]['name_typeEquipment'] ?>')" class="btn btn-danger btn-sm btndel" data-toggle="tooltip" title="" data-original-title="ลบหมวดหมู่"><i class="far fa-trash-alt"></i></button>
                                                    <?php } ?>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>หมวดหมู่</th>
                                            <th>จำนวน</th>
                                            <th>จัดการ</th>
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
    <div class="modal fade" id="modalAdd">
        <div class="modal-dialog modal-lg">
            <form class="modal-dialog modal-lg " method="POST" action='manage.php'>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">เพิ่มหมวดหมู่อุปกรณ์</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="addModalBody">
                        <div class="container">
                            <div class="row mb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                                    <span>ชื่อหมวดหมู่ :</span>
                                </div>
                                <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12">
                                    <span class="bmd-form-group">
                                        <input type="text" class="form-control" id="name_typeEquipment" name="name_typeEquipment" placeholder="กรุณากรอกหมวดหมู่	" maxlength="80"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="add">
                    <div class="modal-footer justify-content">
                        <button type="submit" class="btn btn-primary">ยืนยัน</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>

                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modalEdit">
        <div class="modal-dialog modal-lg">
            <form class="modal-dialog modal-lg " method="POST" action='manage.php'>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">แก้ไขหมวดหมู่อุปกรณ์</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="addModalBody">
                        <div class="container">
                            <div class="row mb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                                    <span>ชื่อหมวดหมู่ :</span>
                                </div>
                                <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12">
                                    <span class="bmd-form-group"><input type="text" class="form-control" id="e_name_typeEquipment" name="e_name_typeEquipment" placeholder="กรุณากรอกชื่อ	" maxlength="8"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="edit">
                    <input type="hidden" name="e_id_typeEquipment" id="e_id_typeEquipment">
                    <div class="modal-footer justify-content">
                        <button type="submit" class="btn btn-primary">ยืนยัน</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>

                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
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
    </script>
</body>

</html>

<script>
    $(document).ready(function() {

        $('.tt').tooltip({
            trigger: "hover"
        });
        $(".btndel").on('click', function() {

        });


    });

    $(document).ready(function() {
        console.log("ready!");
        $("#add").click(function() {
            $("#modalAdd").modal();
        });
    });
    $(".EditType").click(function() {

        var id_typeEquipment = $(this).attr('id_typeEquipment');
        var name_typeEquipment = $(this).attr('name_typeEquipment');

        alert(name_typeEquipment);
        // alert(Ttitle);
        // alert(Tfname);
        // alert(Tlname);

        $('#e_id_typeEquipment').val(id_typeEquipment);
        $('#e_name_typeEquipment').val(name_typeEquipment);

        $("#modalEdit").modal();
    });

    function delfunction(id, num) {

        swal({
                title: "คุณต้องการลบ",
                text: "หมวดหมู่ " + num + " ใช่ไหม",
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
                delfunction_1(id, num);
                setTimeout(function() {
                    location.reload();
                }, 1500);
            });
    }

    function delfunction_1(Tid, num1) {

        $.ajax({
            type: "POST",
            data: {
                Tid: Tid,
                action: "delete"
            },
            url: "./manage.php",
            async: false,
            success: function(result) {}
        });
    }

    function delfunction2(id, Ename) {

        swal({
            title: "คุณไม่สามารถทำรายการได้",
            text: "เนื่องจากหมวดหมู่ " + Ename + " มีอุปกรณ์อยู่",
            icon: "error",
            confirmButtonClass: "btn-danger",
            dangerMode: true,
        })
    }
</script>