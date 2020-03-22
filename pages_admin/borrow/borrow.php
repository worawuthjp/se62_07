<?php
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>การยืม-คืนอุปกรณ์</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include "../view/top-bar.php" ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include "../view/side-bar.php"; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>การยืม-คืนอุปกรณ์</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ระบบยืม-คืนอุปกรณ์</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <!--Modal Form-->
      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">รายการอุปกรณ์ที่ต้องการยืม</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>หมายเลขคำขอ : 6020503887_1</p>
              <table class=" table table-bordered table-striped">
                <thead>
                <tr>
                  <th>เลขครุภัณฑ์</th>
                  <th>ชื่ออุปกรณ์</th>
                  <th>หมวดหมู่อุปกรณ์</th>
                  <th>จำนวนอุปกรณ์</th>
                  <th>ตรวจสอบอุปกรณ์</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1234</td>
                  <td>
                    Arduino
                  </td>
                  <td>IOT</td>
                  <td> 4</td>
                  <td>
                    <input type="checkbox" id="checkboxPrimary1" checked>
                  </td>
                </tr>
                <tr>
                  <td>2222</td>
                  <td>
                    Raspberry Pi
                  </td>
                  <td>Embedded</td>
                  <td> 3</td>
                  <td><input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger"
                             data-on-color="success"></td>
                </tr>
                <tr>
                  <td>12580</td>
                  <td>
                    Monitor
                  </td>
                  <td>อุปกรณ์คอม</td>
                  <td> 1</td>
                  <td><input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger"
                             data-on-color="success"></td>
                </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">ยืนยันการส่งหมอบ</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div> <!--End Modal Form-->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="bg-warning info-box" style="padding: 10px 25px 10px 20px">
              <span class="info-box-icon"><i class="far fa-check-circle"></i></span>
              <div class="info-box-content" style="display: block">
                <span class="info-box-number" style="font-size: 18px">คำขอที่ได้รับการอนุมัติ</span>
                <span class="progress-description">
                  รายการจัดเตรียมอุปกรณ์
                </span>
              </div>
            </div>
            <!-- /.info-box -->
            <div class="card-body">
              <table id="requestTable" class=" table table-bordered table-striped">
                <thead>
                <tr>
                  <th>เลขที่คำขอ</th>
                  <th>รหัสผู้ใช้</th>
                  <th>ชื่อผู้ยืม</th>
                  <th>จำนวนอุปกรณ์</th>
                  <th>การส่งมอบ</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>6020503887_01</td>
                  <td>
                    6020503887
                  </td>
                  <td>วรวุฒิ พันธุสิทธิ์เสรี</td>
                  <td> 4</td>
                  <td><a href="#" class="badge bg-warning" data-toggle="modal" data-target="#modal-lg"
                         style="font-size: 14px;">
                      รอมารับของ</a></td>
                </tr>
                <tr>
                  <td>6020503887_02</td>
                  <td>
                    6020503887
                  </td>
                  <td>วรวุฒิ พันธุสิทธิ์เสรี</td>
                  <td> 3</td>
                  <td><a href="#" class="badge bg-warning" data-toggle="modal" data-target="#modal-lg"
                         style="font-size: 14px;">
                      รอมารับของ</a></td>
                </tr>
                <tr>
                  <td>6020503887_03</td>
                  <td>
                    6020503887
                  </td>
                  <td>วรวุฒิ พันธุสิทธิ์เสรี</td>
                  <td> 1</td>
                  <td><a href="#" class="badge bg-warning" data-toggle="modal" data-target="#modal-lg"
                         style="font-size: 14px;">
                      รอมารับของ</a></td>
                </tr>
                </tbody>
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
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div>
              <div class="info-box bg-success">
                <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-number" style="font-size: 18px">การคืนอุปกรณ์</span>
                  <span class="progress-description">
                  รายการคำขอที่กำลังยืม
                </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="returnthing" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>เลขที่คำขอ</th>
                  <th>รหัสผู้ใช้</th>
                  <th>ชื่อผู้ยืม</th>
                  <th>จำนวนอุปกรณ์</th>
                  <th>ยืนยันการคืน</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>6020500321_01</td>
                  <td>
                    6020500321
                  </td>
                  <td>สนุกดี สดุดี</td>
                  <td> 5</td>
                  <td><a href="#" class="badge bg-primary" data-toggle="modal" data-target="#modal-lg"
                         style="font-size: 14px">กำลังยืม</a></td>
                </tr>
                <tr>
                  <td>6020501302_02</td>
                  <td>
                    6020501302
                  </td>
                  <td>ธนาทร จันทร์รักงาน</td>
                  <td> 2</td>
                  <td><a href="#" class="badge bg-primary" data-toggle="modal" data-target="#modal-lg"
                         style="font-size: 14px">กำลังยืม</a></td>
                </tr>
                <tr>
                  <td>6020503887_03</td>
                  <td>
                    6020503887
                  </td>
                  <td>วรวุฒิ พันธุสิทธิ์เสรี</td>
                  <td> 3</td>
                  <td><a href="#" class="badge bg-danger" data-toggle="modal" data-target="#modal-lg"
                         style="font-size: 14px">เกินกำหนดเวลา</a></td>
                </tr>
                </tbody>
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

  <?php include "../view/footer-bar.php"; ?>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Bootstrap Switch -->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#requestTable')
      .DataTable({
        'responsive': true,
        'autoWidth': false
      });
    $('#returnthing')
      .DataTable({
        'responsive': true,
        'autoWidth': false
      });
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
  })
</script>
</body>
</html>

