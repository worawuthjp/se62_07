<!DOCTYPE html>
<html>

<head>
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
                                    <h3>2 อุปกรณ์</h3>

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
                                    <h3>2 อุปกรณ์</h3>

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
                                        <b>ชื่อผู้ใช้งาน</b> <a class="float-right">นายภาณุภัสส์ ธนัชญ์สุธาโชติ</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>รหัส</b> <a class="float-right">6020500381</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>คณะ</b> <a class="float-right">วิศวกรรมศาสคร์</a>
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
                                <h3 class="card-title">การยืมคืนล่าสุด</h3>

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
                                                <th>Order ID</th>
                                                <th>Item</th>
                                                <th>Status</th>
                                                <th>Popularity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                                <td>Call of Duty IV</td>
                                                <td><span class="badge badge-success">Shipped</span></td>
                                                <td>
                                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                        90,80,90,-70,61,-83,63</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                                <td>Samsung Smart TV</td>
                                                <td><span class="badge badge-warning">Pending</span></td>
                                                <td>
                                                    <div class="sparkbar" data-color="#f39c12" data-height="20">
                                                        90,80,-90,70,61,-83,68</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                                <td>iPhone 6 Plus</td>
                                                <td><span class="badge badge-danger">Delivered</span></td>
                                                <td>
                                                    <div class="sparkbar" data-color="#f56954" data-height="20">
                                                        90,-80,90,70,-61,83,63</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                                <td>Samsung Smart TV</td>
                                                <td><span class="badge badge-info">Processing</span></td>
                                                <td>
                                                    <div class="sparkbar" data-color="#00c0ef" data-height="20">
                                                        90,80,-90,70,-61,83,63</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                                <td>Samsung Smart TV</td>
                                                <td><span class="badge badge-warning">Pending</span></td>
                                                <td>
                                                    <div class="sparkbar" data-color="#f39c12" data-height="20">
                                                        90,80,-90,70,61,-83,68</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                                <td>iPhone 6 Plus</td>
                                                <td><span class="badge badge-danger">Delivered</span></td>
                                                <td>
                                                    <div class="sparkbar" data-color="#f56954" data-height="20">
                                                        90,-80,90,70,-61,83,63</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                                <td>Call of Duty IV</td>
                                                <td><span class="badge badge-success">Shipped</span></td>
                                                <td>
                                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                        90,80,90,-70,61,-83,63</div>
                                                </td>
                                            </tr>
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
                                <table class="table table-bordered table-striped">
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

                                        <tr>
                                            <td>บอร์ดAduino</td>
                                            <td>นาย เอก สมหวัง</td>
                                            <td>02/08/2562</td>
                                            <td rel="tooltip" title="รายชื่ออุปกรณ์" id='NameEquipment'>1
                                                อุปกรณ์
                                            </td>
                                            <td>อ.นุชนาฎ สัตยากวี</td>
                                            <td class="td-actions text-center">
                                                <button type="button" rel="tooltip" title="ยกเลิก"
                                                    class="btn btn-black btn-link btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="ยกเลิก"
                                                    class="btn btn-black btn-link btn-sm">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <!-- <td class="sorting_1">AC032948555</td> -->
                                            <td>บอร์ดAduino2</td>
                                            <td>นาย สอง สามสี่</td>
                                            <td>02/08/2562</td>
                                            <td rel="tooltip" title="รายชื่ออุปกรณ์"><a href="">2
                                                    อุปกรณ์</a>
                                            </td>
                                            <td>อ.นุชนาฎ สัตยากวี</td>
                                            <td class="td-actions text-center">
                                                <button type="button" rel="tooltip" title="ยกเลิก"
                                                    class="btn btn-black btn-link btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="ยกเลิก"
                                                    class="btn btn-black btn-link btn-sm">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>

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
                                <table class="table table-bordered table-striped">
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
                                        <tr>
                                            <td class="sorting_1">AC032948234</td>
                                            <td>บอร์ดAduino</td>
                                            <td>นาย เอก สมหวัง</td>
                                            <td>02/08/2562</td>
                                            <td>18/08/2562</td>
                                            <td>อ.นุชนาฎ สัตยากวี</td>
                                            <td class="td-actions text-center">ยังไม่คืน</td>
                                        </tr>
                                        <tr>
                                            <td class="sorting_1">2AC032948555</td>
                                            <td>บอร์ดAduino2</td>
                                            <td>นาย สอง สามสี่</td>
                                            <td>02/08/2562</td>
                                            <td>12/08/2562</td>
                                            <td>อ.นุชนาฎ สัตยากวี</td>
                                            <td class="td-actions text-center">รอมารับของ</td>
                                        </tr>

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
        <?php include("../../../main/footerAdmin.php"); ?>

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
