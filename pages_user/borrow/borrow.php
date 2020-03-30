<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ยืมอุปกรณ์</title>
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
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper" style="height: 100vh">
  <!-- Navbar -->
  <?php include "../view/top-bar.php"; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include "../view/side-bar.php"; ?>
  <!--SQL-->
  <?php
  require "../../dbConnect.php";
  $sql = "SELECT type_equipment.id_typeEquipment,equipment.id_equipment,equipment.pic , type_equipment.name_typeEquipment , equipment.name_equipment , count(serial_number.name_serial) , equipment.e_teacher , equipment.e_user , equipment.e_staff , equipment.detail FROM equipment 
    INNER JOIN type_equipment ON equipment.id_typeEquipment = type_equipment.id_typeEquipment 
    INNER JOIN serial_number ON serial_number.id_equipment = equipment.id_equipment 
    WHERE equipment.isDelete = 0 GROUP BY name_equipment";
  $dataTable = selectData($sql);
  ?>
  <!--End SQL-->
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
    <section class="content ">

      <!-- Default box -->
      <div class="card card-solid boxShow">
        <div class="card ">
          <div class="card-header " style="background-color: #006636 ;">
            <!-- SEARCH FORM -->
            <?php include "../view/search-component.php"; ?>
          </div>
          <div class="card-body pb-0">
            <!--Row Show-->
            <div class="row d-flex align-items-start">

              <?php
              if(isset($dataTable)){
                for($i=0;$i<$dataTable[0]['numrow'];$i++){
                  //show Available Equipment
                  if($dataTable[$i+1]['e_user'] == 1) {

                    echo "<div class=\"col-8 col-md-3 dataShow\">
                <div class=\"card bg-light\" id=\"box\">
                  <div class=\"card-header text-muted border-bottom-0\">

                  </div>
                  <div class=\"card-body pt-0\">
                    <div class=\"col-lg-12 text-center\">
                      <img src=\"https://cf.shopee.co.th/file/90ff630a900e44653f735e1439c97d90\" alt=\"\" class=\"img-bordered img-fluid col-7\">
                    </div>
                    <div class=\"row\">
                      <div class=\"col-12\">
                        <br class=\"mb-1\">
                        <ul class=\"ml-md-2 mb-0 fa-ul text-muted\">
                          <li class=\"m-1\"><b>ชื่ออุปกรณ์ : </b> " . $dataTable[$i + 1]['name_equipment'] . "</li>
                          <li class=\"m-1\"><b>หมวดหมู่ : </b> " . $dataTable[$i + 1]['name_typeEquipment'] . "</li>
                          <li class=\"m-1\"><b>จำนวนคงเหลือ : </b>" . $dataTable[$i + 1]['count(serial_number.name_serial)'] . "</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class=\"card-footer\">
                    <div class=\"text-right\">
                      <!--<a href=\"#\" class=\"btn btn-sm bg-gradient-green\" id='addList' numItem=''>
                        <i class=\"fas fa-plus-square\"></i> เพิ่มลงรายการ
                      </a>-->
                      <a href=\"#\" class=\"btn btn-sm btn-primary\" data-target='#borrowModal' data-toggle='modal' id='btnSend' eid=".$dataTable[$i+1]['id_equipment']."
                      >
                        <i class=\"fas fa-edit\"></i> ส่งคำขอ
                      </a>
                    </div>
                  </div>
                </div>
              </div>";
                  }
                }
              }
              ?>
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
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!--Date Range Picker-->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
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

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
  });

  $('#btnSend').click(function () {

  })

</script>
<?php include "../view/script-import.php"; ?>
</body>
</html>

