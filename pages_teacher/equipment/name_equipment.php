<!DOCTYPE html>
<html>
<?php session_start();
?>

<head>
  <?php include("../../dbConnect.php");
  $sqltable = "SELECT equipment.pic , type_equipment.name_typeEquipment , equipment.name_equipment , count(serial_number.name_serial)
, equipment.e_teacher , equipment.e_user , equipment.e_staff , equipment.detail FROM equipment
INNER JOIN type_equipment ON equipment.id_typeEquipment = type_equipment.id_typeEquipment
INNER JOIN serial_number ON serial_number.id_equipment = equipment.id_equipment
GROUP BY name_equipment";
  $table = selectData($sqltable);
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ระบบยืม-คืนอุปกรณ์</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <title>AdminLTE 3 | DataTables</title>
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php include "../view/top-bar.php"; ?>

    <!-- Main Sidebar Container -->
    <?php include "../view/side-bar.php"; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">จัดการอุปกรณ์</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->


      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>2 อุปกรณ์</h3>
                  <p>จำนวนอุปกรณ์</p>
                </div>
                <div class="icon">
                  <i style="top: 0%" class="ion-wrench"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <a href="#">
                <div class="small-box bg-success" data-target="#modal-lg" data-toggle="modal">
                  <div class="inner">
                    <h3 align="center">เพิ่มอุปกรณ์</h3>
                    <p style="color: forestgreen">.</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-plus-round"></i>
                  </div>
                </div>
              </a>
            </div>
            <!-- ./col -->

          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"></div>
            <!-- /.col -->
          </div>
          <section class="content">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">รายชื่ออุปกรณ์</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>รูปอุปกรณ์</th>
                          <th>หมวดหมู่อุปกรณ์</th>
                          <th>ชื่ออุปกรณ์</th>
                          <th>จำนวนอุปกรณ์</th>
                          <th>สิทธิ์การยืม</th>
                          <th>รายละเอียดอื่นๆ</th>
                          <th>จัดการ</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        for ($i = 0; $i < $table[0]['numrow']; $i++) {
                        ?>
                          <tr>
                            <td><?php echo $table[$i + 1]['pic'] ?></td>
                            <td><?php echo $table[$i + 1]['name_typeEquipment'] ?></td>
                            <td><?php echo $table[$i + 1]['name_equipment'] ?></td>
                            <td><?php echo $table[$i + 1]['count(serial_number.name_serial)'] ?></td>
                            <td>
                              <!--check-->
                              <?php if ($table[$i + 1]['e_staff'] == 1) { ?>
                                <a class="btn btn-success btn-square btn-sm active" data-toggle="tooltip" title="" data-original-title="ผู้ดูแลระบบ">
                                  <b>
                                    A
                                  </b>
                                </a>
                              <?php } else { ?>
                                <a class="btn btn-danger btn-square btn-sm active" data-toggle="tooltip" title="" data-original-title="ผู้ดูแลระบบ">
                                  <b>
                                    A
                                  </b>
                                </a>
                              <?php } ?>
                              <?php if ($table[$i + 1]['e_teacher'] == 1) { ?>
                                <a class="btn btn-success btn-square btn-sm active" data-toggle="tooltip" title="" data-original-title="ผู้ดูแลระบบ">
                                  <b>
                                    T
                                  </b>
                                </a>
                              <?php } else { ?>
                                <a class="btn btn-danger btn-square btn-sm active" data-toggle="tooltip" title="" data-original-title="ผู้ดูแลระบบ">
                                  <b>
                                    T
                                  </b>
                                </a>
                              <?php } ?>
                              <?php if ($table[$i + 1]['e_user'] == 1) { ?>
                                <a class="btn btn-success btn-square btn-sm active" data-toggle="tooltip" title="" data-original-title="ผู้ดูแลระบบ">
                                  <b>
                                    U
                                  </b>
                                </a>
                              <?php } else { ?>
                                <a class="btn btn-danger btn-square btn-sm active" data-toggle="tooltip" title="" data-original-title="ผู้ดูแลระบบ">
                                  <b>
                                    U
                                  </b>
                                </a>
                              <?php } ?>
                            </td>
                            <td><?php echo $table[$i + 1]['detail'] ?></td>

                            <td class="text-right py-0 align-middle">
                              <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                              </div>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>รูปอุปกรณ์</th>
                          <th>หมวดหมู่อุปกรณ์</th>
                          <th>ชื่ออุปกรณ์</th>
                          <th>จำนวนอุปกรณ์</th>
                          <th>สิทธิ์การยืม</th>
                          <th>รายละเอียดอื่นๆ</th>
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

          <!-- ./row -->
    </div><!-- /.container-fluid -->
    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">เพิ่มรายการอุปกรณ์</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body card-body">
            <div class="form-group row">
              <label for="inputEmail3" class="col-md-3 col-form-label  text-right">เลขครุภัณฑ์: </label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="inputEmail3" placeholder="กรุณากรอกเลขครุภัณฑ์">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-md-3 col-form-label text-right">ชื่ออุปกรณ์: </label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="inputEmail3" placeholder="กรุณากรอกชนิดอุปกรณ์">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-md-3 col-form-label text-right">หมวดหมู่อุปกรณ์*: </label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="inputEmail3" placeholder="กรุณากรอกชนิดอุปกรณ์">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-md-3 col-form-label text-right">จำนวนอุปกรณ์: </label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="inputEmail3" placeholder="กรุณากรอกจำนวนอุปกรณ์">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-md-3 col-form-label text-right">สิทธิ์การยืม: </label>
              <div class="col-sm-9">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox">
                  <label class="form-check-label">อาจารย์</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox">
                  <label class="form-check-label">นิสิต</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox">
                  <label class="form-check-label">บุคลากรภายนอก</label>
                </div>
              </div>
            </div>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">เพิ่มรูปอุปกรณ์</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-end">
            <button type="button" class="btn btn-primary">ยืนยัน</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
          </div>
        </div>

        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="modal-xl">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Extra Large Modal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>One fine body&hellip;</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    </footer>

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
  <!-- SweetAlert2 -->
  <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="../../plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  <!-- bs-custom-file-input -->
  <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      bsCustomFileInput.init();
    });
  </script>
  <!-- DataTables -->
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

  <script type="text/javascript">
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      $('.swalDefaultSuccess').click(function() {
        Toast.fire({
          type: 'success',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultInfo').click(function() {
        Toast.fire({
          type: 'info',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultError').click(function() {
        Toast.fire({
          type: 'error',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultWarning').click(function() {
        Toast.fire({
          type: 'warning',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultQuestion').click(function() {
        Toast.fire({
          type: 'question',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });

      $('.toastrDefaultSuccess').click(function() {
        toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
      $('.toastrDefaultInfo').click(function() {
        toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
      $('.toastrDefaultError').click(function() {
        toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
      $('.toastrDefaultWarning').click(function() {
        toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });

      $('.toastsDefaultDefault').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultTopLeft').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          position: 'topLeft',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultBottomRight').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          position: 'bottomRight',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultBottomLeft').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          position: 'bottomLeft',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultAutohide').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          autohide: true,
          delay: 750,
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultNotFixed').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          fixed: false,
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultFull').click(function() {
        $(document).Toasts('create', {
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          icon: 'fas fa-envelope fa-lg',
        })
      });
      $('.toastsDefaultFullImage').click(function() {
        $(document).Toasts('create', {
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          image: '../../dist/img/user3-128x128.jpg',
          imageAlt: 'User Picture',
        })
      });
      $('.toastsDefaultSuccess').click(function() {
        $(document).Toasts('create', {
          class: 'bg-success',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultInfo').click(function() {
        $(document).Toasts('create', {
          class: 'bg-info',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultWarning').click(function() {
        $(document).Toasts('create', {
          class: 'bg-warning',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultDanger').click(function() {
        $(document).Toasts('create', {
          class: 'bg-danger',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultMaroon').click(function() {
        $(document).Toasts('create', {
          class: 'bg-maroon',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
    });
  </script>
</body>

</html>