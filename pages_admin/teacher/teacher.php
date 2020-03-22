<!DOCTYPE html>
<html>
<?php session_start();
?>

<head>
    <?php include("../../dbConnect.php");
    $sql_Historyborrow = "";
    $TableHistory = selectData($sql_Historyborrow)
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
                                        <?php for ($i = 0; $i < $TableHistory[0]['numrow']; $i++) { ?>
                                            <tr role="row" class="odd">
                                                <td><?php echo $TableHistory[$i + 1]['name_serial'] ?></td>
                                                <td><?php echo $TableHistory[$i + 1]['name_equipment'] ?></td>
                                                <td><?php echo $TableHistory[$i + 1]['title'] ?> <?php echo $TableHistory[$i + 1]['fname'] ?> <?php echo  $TableHistory[$i + 1]['lname'] ?> </td>
                                                <td><?php echo $TableHistory[$i + 1]['start_borrow'] ?></td>
                                                <td><?php echo $TableHistory[$i + 1]['end_borrow'] ?></td>
                                                <td><?php echo $TableHistory[$i + 1]['date_return'] ?></td>
                                                <td><?php echo $TableHistory[$i + 1]['Ttitle'] ?> <?php echo $TableHistory[$i + 1]['Tfname'] ?> <?php echo  $TableHistory[$i + 1]['Tlname'] ?> </td>
                                                <td><?php echo $TableHistory[$i + 1]['status'] ?></td>
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