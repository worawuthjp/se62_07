<?php ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Contacts</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper" style="height: 100vh">
  <!-- Navbar -->
  <?php include "../view/top-bar.php"; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include "../view/side-bar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper overflow-auto" style="height: 80vh">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ยืมอุปกรณ์</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">รายการอุปกรณ์</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card ">
          <div class="card-header " style="background-color: #006636 ;">
            <!-- SEARCH FORM -->
            <?php include "../view/search-component.php";?>
          </div>
          <div class="card-body pb-0">
            <!--Row Show-->
            <div class="row d-flex align-items-start">
              <!--Show Available Equipment-->
              <div class="col-8 col-md-3" >
                <div class="card bg-light" id="dataShow">
                  <div class="card-header text-muted border-bottom-0">

                  </div>
                  <div class="card-body pt-0">
                    <div class="col-lg-12 text-center">
                      <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-bordered img-fluid col-7">
                    </div>
                    <div class="row">
                      <div class="col-10">
                        <br class="mb-1">
                        <ul class="ml-md-2 mb-0 fa-ul text-muted" id="dataShow">
                          <li class="m-1"><b>ชื่ออุปกรณ์ : </b> Arduino</li>
                          <li class="m-1"><b>หมวดหมู่ : </b> IOT</li>
                          <li class="m-1"><b>จำนวนคงเหลือ : </b>10 ชิ้น</li>
                          <li class="m-1"><b>สิทธิ์การยืม : </b>A U T</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <a href="#" class="btn btn-sm bg-gradient-green">
                        <i class="fas fa-plus-square"></i> เพิ่มลงรายการ
                      </a>
                      <a href="#" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i> ส่งคำขอ
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-8 col-md-3" id="dataShow">
                <div class="card bg-light">
                  <div class="card-header text-muted border-bottom-0">

                  </div>
                  <div class="card-body pt-0">
                    <div class="col-lg-12 text-center">
                      <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-bordered img-fluid col-7">
                    </div>
                    <div class="row">
                      <div class="col-10">
                        <br class="mb-1">
                        <ul class="ml-md-2 mb-0 fa-ul text-muted" >
                          <li class="m-1"><b>ชื่ออุปกรณ์ : </b> Arduino</li>
                          <li class="m-1"><b>หมวดหมู่ : </b> IOT</li>
                          <li class="m-1"><b>จำนวนคงเหลือ : </b>10 ชิ้น</li>
                          <li class="m-1"><b>สิทธิ์การยืม : </b>A U T</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <a href="#" class="btn btn-sm bg-gradient-green">
                        <i class="fas fa-plus-square"></i> เพิ่มลงรายการ
                      </a>
                      <a href="#" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i> ส่งคำขอ
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-8 col-md-3">
                <div class="card bg-light">
                  <div class="card-header text-muted border-bottom-0">

                  </div>
                  <div class="card-body pt-0">
                    <div class="col-lg-12 text-center">
                      <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-bordered img-fluid col-7">
                    </div>
                    <div class="row">
                      <div class="col-10">
                        <br class="mb-1">
                        <ul class="ml-md-2 mb-0 fa-ul text-muted">
                          <li class="m-1"><b>ชื่ออุปกรณ์ : </b> Arduino</li>
                          <li class="m-1"><b>หมวดหมู่ : </b> IOT</li>
                          <li class="m-1"><b>จำนวนคงเหลือ : </b>10 ชิ้น</li>
                          <li class="m-1"><b>สิทธิ์การยืม : </b>A U T</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <a href="#" class="btn btn-sm bg-gradient-green">
                        <i class="fas fa-plus-square"></i> เพิ่มลงรายการ
                      </a>
                      <a href="#" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i> ส่งคำขอ
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-8 col-md-3">
                <div class="card bg-light">
                  <div class="card-header text-muted border-bottom-0">

                  </div>
                  <div class="card-body pt-0">
                    <div class="col-lg-12 text-center">
                      <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-bordered img-fluid col-7">
                    </div>
                    <div class="row">
                      <div class="col-10">
                        <br class="mb-1">
                        <ul class="ml-md-2 mb-0 fa-ul text-muted" id="dataShow">
                          <li class="m-1"><b>ชื่ออุปกรณ์ : </b> Arduino</li>
                          <li class="m-1"><b>หมวดหมู่ : </b> IOT</li>
                          <li class="m-1"><b>จำนวนคงเหลือ : </b>10 ชิ้น</li>
                          <li class="m-1"><b>สิทธิ์การยืม : </b>A U T</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <a href="#" class="btn btn-sm bg-gradient-green">
                        <i class="fas fa-plus-square"></i> เพิ่มลงรายการ
                      </a>
                      <a href="#" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i> ส่งคำขอ
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!--End SHOW Available Equipment-->
              <!--Show Available Equipment-->
              <div class="col-8 col-md-3">
                <div class="card bg-light">
                  <div class="card-header text-muted border-bottom-0">

                  </div>
                  <div class="card-body pt-0">
                    <div class="col-lg-12 text-center">
                      <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-bordered img-fluid col-7">
                    </div>
                    <div class="row">
                      <div class="col-10">
                        <br class="mb-1">
                        <ul class="ml-md-2 mb-0 fa-ul text-muted" id="dataShow">
                          <li class="m-1"><b>ชื่ออุปกรณ์ : </b> Arduino</li>
                          <li class="m-1"><b>หมวดหมู่ : </b> IOT</li>
                          <li class="m-1"><b>จำนวนคงเหลือ : </b>10 ชิ้น</li>
                          <li class="m-1"><b>สิทธิ์การยืม : </b>A U T</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <a href="#" class="btn btn-sm bg-gradient-green">
                        <i class="fas fa-plus-square"></i> เพิ่มลงรายการ
                      </a>
                      <a href="#" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i> ส่งคำขอ
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-8 col-md-3">
                <div class="card bg-light">
                  <div class="card-header text-muted border-bottom-0">

                  </div>
                  <div class="card-body pt-0">
                    <div class="col-lg-12 text-center">
                      <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-bordered img-fluid col-7">
                    </div>
                    <div class="row">
                      <div class="col-10">
                        <br class="mb-1">
                        <ul class="ml-md-2 mb-0 fa-ul text-muted" id="dataShow">
                          <li class="m-1"><b>ชื่ออุปกรณ์ : </b> Arduino</li>
                          <li class="m-1"><b>หมวดหมู่ : </b> IOT</li>
                          <li class="m-1"><b>จำนวนคงเหลือ : </b>10 ชิ้น</li>
                          <li class="m-1"><b>สิทธิ์การยืม : </b>A U T</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <a href="#" class="btn btn-sm bg-gradient-green">
                        <i class="fas fa-plus-square"></i> เพิ่มลงรายการ
                      </a>
                      <a href="#" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i> ส่งคำขอ
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-8 col-md-3">
                <div class="card bg-light">
                  <div class="card-header text-muted border-bottom-0">

                  </div>
                  <div class="card-body pt-0">
                    <div class="col-lg-12 text-center">
                      <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-bordered img-fluid col-7">
                    </div>
                    <div class="row">
                      <div class="col-10">
                        <br class="mb-1">
                        <ul class="ml-md-2 mb-0 fa-ul text-muted" id="dataShow">
                          <li class="m-1"><b>ชื่ออุปกรณ์ : </b> Arduino</li>
                          <li class="m-1"><b>หมวดหมู่ : </b> IOT</li>
                          <li class="m-1"><b>จำนวนคงเหลือ : </b>10 ชิ้น</li>
                          <li class="m-1"><b>สิทธิ์การยืม : </b>A U T</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <a href="#" class="btn btn-sm bg-gradient-green">
                        <i class="fas fa-plus-square"></i> เพิ่มลงรายการ
                      </a>
                      <a href="#" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i> ส่งคำขอ
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-8 col-md-3">
                <div class="card bg-light">
                  <div class="card-header text-muted border-bottom-0">

                  </div>
                  <div class="card-body pt-0">
                    <div class="col-lg-12 text-center">
                      <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-bordered img-fluid col-7">
                    </div>
                    <div class="row">
                      <div class="col-10">
                        <br class="mb-1">
                        <ul class="ml-md-2 mb-0 fa-ul text-muted" id="dataShow">
                          <li class="m-1"><b>ชื่ออุปกรณ์ : </b> Arduino</li>
                          <li class="m-1"><b>หมวดหมู่ : </b> IOT</li>
                          <li class="m-1"><b>จำนวนคงเหลือ : </b>10 ชิ้น</li>
                          <li class="m-1"><b>สิทธิ์การยืม : </b>A U T</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <a href="#" class="btn btn-sm bg-gradient-green">
                        <i class="fas fa-plus-square"></i> เพิ่มลงรายการ
                      </a>
                      <a href="#" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i> ส่งคำขอ
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!--End SHOW Available Equipment-->
            </div>
            <!--End Row Show-->
          </div>
          <!-- /.card-body -->
        </div>

        <div class="card-footer">
          <?php include "../view/page-Navigation.php"; ?>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
    <?php include("../view/footer-bar.php"); ?>
    <!-- /.content-wrapper -->
  </div>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
  $(function () {
    $('#example1')
      .DataTable({
        'responsive': true,
        'autoWidth': false
      })
    $('#example2')
      .DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false,
        'responsive': true
      })
  })
</script>
<?php include "../view/script-import.php"; ?>
</body>
</html>

