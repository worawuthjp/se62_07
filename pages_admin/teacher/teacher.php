<!DOCTYPE html>
<html>
<?php session_start();
?>

<head>
    <?php include("../../dbConnect.php");
    $sql_Teacher = "SELECT teacher.id_teacher,teacher.Ttitle,teacher.Tfname,teacher.Tlname,teacher.email FROM `teacher` ";
    $TableTeacher = selectData($sql_Teacher)
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
                <h1>
                    รายชื่ออาจารย์
                </h1>
                <ol class="breadcrumb">
                    <li><a href="../../pages_admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>

                    <li class="active">Data tables</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">อาจารย์</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>ชื่ออาจารย์</th>
                                            <th>e-mail</th>
                                            <th>จัดการ</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < $TableTeacher[0]['numrow']; $i++) { ?>
                                            <tr role="row" class="odd">
                                                <td><?php echo $TableTeacher[$i + 1]['Ttitle'] ?> <?php echo $TableTeacher[$i + 1]['Tfname'] ?> <?php echo  $TableTeacher[$i + 1]['Tlname'] ?> </td>
                                                <td><?php echo $TableTeacher[$i + 1]['email'] ?></td>
                                                <td style="text-align:center;">
                                                    <a>
                                                        <button type="button" class="btn btn-warning  btn-sm" 4 data-toggle="tooltip" title="แก้ไขข้อมูล">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    <button type="button" onclick="delfunction('<?php echo $TableTeacher[$i + 1]['id_teacher'] ?>'
                                                    ,'<?php echo $TableTeacher[$i + 1]['Tfname'] ?>')" class="btn btn-danger btn-sm btndel" data-toggle="tooltip" title="" data-original-title="ลบอาจารย์"><i class="far fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ชื่ออาจารย์</th>
                                            <th>e-mail</th>
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
        $("#addRoom").on('click', function() {
            $("#modalAddRoom").modal('show');
        });
        $('[data-toggle="tooltip"]').tooltip();
    });

    // function EditRoom() {
    //     $("#modalEdit").modal('show');
    // }
    $(".EditRoom").click(function() {
        var rid = $(this).attr('rid');
        var rnumber = $(this).attr('rnumber');
        var rent = $(this).attr('rent');
        var detail = $(this).attr('detail');

        //alert(detail);
        // alert(rnumber);
        // alert(startDate);
        // alert(endDate);
        $('#e_rid').val(rid);
        $('#e_rnumber').val(rnumber);
        $('#e_rent').val(rent);
        $('#e_detail').val(detail);

        $("#modalEdit").modal();
    });

    $(".detailRoom").click(function() {
        var detail = $(this).attr('detail');

        //alert(detail);
        $('#d_detail').val(detail);


        $("#modalDetailRoom").modal();
    });

    function delfunction(id, num) {

        swal({
                title: "คุณแน่ใจที่จะยืนยันการลบใช่มั้ย?",
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
</script>