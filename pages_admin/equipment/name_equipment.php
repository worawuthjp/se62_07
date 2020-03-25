<!DOCTYPE html>
<html>
<?php session_start();
?>

<head>
  <?php include("../../dbConnect.php");
  $sqltable = "SELECT type_equipment.id_typeEquipment,equipment.id_equipment,equipment.pic , type_equipment.name_typeEquipment , equipment.name_equipment , count(serial_number.name_serial)
, equipment.e_teacher , equipment.e_user , equipment.e_staff , equipment.detail FROM equipment
INNER JOIN type_equipment ON equipment.id_typeEquipment = type_equipment.id_typeEquipment
INNER JOIN serial_number ON serial_number.id_equipment = equipment.id_equipment
WHERE equipment.isDelete = 0
GROUP BY name_equipment";
  $table = selectData($sqltable);

  $sqltype = "SELECT type_equipment.id_typeEquipment,type_equipment.name_typeEquipment FROM type_equipment";
  $type = selectData($sqltype);


  $sqlnumber = "SELECT COUNT(serial_number.id_serial) FROM serial_number";
  $number = selectDataOne($sqlnumber);
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
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css.map">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
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
              <li class="breadcrumb-item"><a href="../index/index_admin.php">Home</a></li>
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
                <h3><?php echo $number['COUNT(serial_number.id_serial)'] ?> อุปกรณ์</h3>
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
                    <tr align="center">
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
                        <td align="center"><?php echo $table[$i + 1]['pic'] ?></td>
                        <td><?php echo $table[$i + 1]['name_typeEquipment'] ?></td>
                        <td><?php echo $table[$i + 1]['name_equipment'] ?></td>
                        <td align="center"><?php echo $table[$i + 1]['count(serial_number.name_serial)'] ?></td>
                        <td align="center">
                          <!--check-->
                          <?php if ($table[$i + 1]['e_staff'] == 1) { ?>
                            <a class="btn btn-success btn-square btn-sm active" data-toggle="tooltip" title=""
                               data-original-title="ผู้ดูแลระบบ">
                              <b>
                                A
                              </b>
                            </a>
                          <?php } else { ?>
                            <a class="btn btn-danger btn-square btn-sm active" data-toggle="tooltip" title=""
                               data-original-title="ผู้ดูแลระบบ">
                              <b>
                                A
                              </b>
                            </a>
                          <?php } ?>
                          <?php if ($table[$i + 1]['e_teacher'] == 1) { ?>
                            <a class="btn btn-success btn-square btn-sm active" data-toggle="tooltip" title=""
                               data-original-title="ผู้ดูแลระบบ">
                              <b>
                                T
                              </b>
                            </a>
                          <?php } else { ?>
                            <a class="btn btn-danger btn-square btn-sm active" data-toggle="tooltip" title=""
                               data-original-title="ผู้ดูแลระบบ">
                              <b>
                                T
                              </b>
                            </a>
                          <?php } ?>
                          <?php if ($table[$i + 1]['e_user'] == 1) { ?>
                            <a class="btn btn-success btn-square btn-sm active" data-toggle="tooltip" title=""
                               data-original-title="ผู้ดูแลระบบ">
                              <b>
                                U
                              </b>
                            </a>
                          <?php } else { ?>
                            <a class="btn btn-danger btn-square btn-sm active" data-toggle="tooltip" title=""
                               data-original-title="ผู้ดูแลระบบ">
                              <b>
                                U
                              </b>
                            </a>
                          <?php } ?>
                        </td>
                        <td><?php echo $table[$i + 1]['detail'] ?></td>

                        <!-- ปุ่มเพิ่ม-ลบ-->
                        <td style="text-align:center;">
                          <a href="#" class="editEquipment" pic="<?php echo $table[$i + 1]['pic']; ?>"
                             type_Equipment="<?php echo $table[$i + 1]['name_typeEquipment'] ?>"
                             name_equipment="<?php echo $table[$i + 1]['name_equipment'] ?>"
                             count="<?php echo $table[$i + 1]['count(serial_number.name_serial)'] ?>"
                             e_staff="<?php echo $table[$i + 1]['e_staff'] ?>"
                             e_teacher="<?php echo $table[$i + 1]['e_teacher'] ?>"
                             e_user="<?php echo $table[$i + 1]['e_user'] ?>"
                             detail="<?php echo $table[$i + 1]['detail'] ?>"
                             e_id="<?php echo $table[$i + 1]['id_equipment'] ?>"
                             type_id="<?php echo $table[$i + 1]['id_typeEquipment'] ?>">
                            <button type="button" class="btn btn-warning  btn-sm" 4 data-toggle="modal"
                                    title="แก้ไขข้อมูล" data-target="#modalEdit">
                              <i class="fas fa-edit"></i>
                            </button>
                          </a>
                          <button type="button"
                                  onclick="delfunction('<?php echo $table[$i + 1]['id_equipment'] ?>','<?php echo $table[$i + 1]['name_equipment'] ?>')"
                                  class="btn btn-danger btn-sm btndel" data-toggle="tooltip" title=""
                                  data-original-title="ลบอาจารย์"><i class="far fa-trash-alt"></i>
                          </button>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr align="center">
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
  <!--แก้ไขข้อมูล-->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">แก้ไขรายละเอียดอุปกรณ์</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="test1"></p>

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

  <!--โมดัลแก้ไข-->
  <div id="modalEdit" class="modal fade">
    <form class="modal-dialog modal-lg" method="post" action='manage.php'>
      <div class="modal-content">
        <div class="modal-header" style="background-color:#eecc0b">
          <h4 class="modal-title" style="color:white">แก้ไขรายการอุปกรณ์</h4>
        </div>
        <div class="modal-body" id="addModalBody">
          <div class="row mb-4">
            <div class="col-xl-3 col-12 text-right">
              <span>หมวดหมู่อุปกรณ์ :</span>
            </div>
            <div class="col-xl-8 col-12" >
              <select class="form-control" name="id_typeEquipment">
                <?php
                for ($i = 0; $i < $type[0]['numrow']; $i++) {
                  echo '<option value="'.$type[$i+1]['id_typeEquipment'].'">'.$type[$i + 1]['name_typeEquipment'].'</option>';
                }
                ?>
              </select>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-xl-3 col-12 text-right">
              <span>ชื่ออุปกรณ์:</span>
            </div>
            <div class="col-xl-8 col-12">
              <input type="text" class="form-control" id="e_name_equipment" name="e_name" value=""
                     placeholder="ชื่ออุปกรณ์" maxlength="100">
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-xl-3 col-12 text-right">
              <span>จำนวนอุปกรณ์:</span>
            </div>
            <div class="col-xl-8 col-12">
              <input id="e_count" name="count" class="form-control" value="" placeholder="">
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-xl-3 col-12 text-right">
              <span>สิทธิ์การยืม:</span>
            </div>
            <div class="col-xl-8 col-12">
              <p><input type="checkbox" name="adcheck" id="adcheck"> (A)ผู้ดูแลระบบ </input></p>
              <p><input type="checkbox" name="tcheck" id="tcheck"> (T)อาจารย์ </input></p>
              <p><input type="checkbox" name="ucheck" id="ucheck"> (U)นิสิต </input></p>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-xl-3 col-12 text-right">
              <span>รายละเอียด:</span>
            </div>
            <div class="col-xl-8 col-12">
              <!-- <input type="text" class="form-control" id="mail" value="ทีวี ตู้เย็น" placeholder="กรุณากรอกรายละเอียด"> -->
              <textarea id="e_detail" name="e_detail" rows="5" cols="60" class="form-control" value=""
                        placeholder=""></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="edit">บันทึก</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
          <input type="hidden" name="e_id" id="e_id">
          </input>
        </div>
    </form>
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
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
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
  $(function () {
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
      function () {
        swal("ยืนยันสำเร็จเรียบร้อยแล้ว", {
          icon: "success",
          buttons: false
        });
        delfunction_1(id);
        setTimeout(function () {
          location.reload();
        }, 1500);
      });
  }

  function delfunction_1(Eid) {
    $.ajax({
      type: "POST",
      data: {
        Eid: Eid,
        delete: "delete"
      },
      url: "./manage.php",
      async: false,
      success: function (result) {
      }
    });
  }

  $(".editEquipment").click(function () {
    var pic = $(this).attr('pic');
    var name_type = $(this).attr('type_Equipment');
    var name_equipment = $(this).attr('name_equipment');
    var count = $(this).attr('count');
    var e_staff = $(this).attr('e_staff');
    var e_teacher = $(this).attr('e_teacher');
    var e_user = $(this).attr('e_user');
    var detail = $(this).attr('detail');
    var e_id = $(this).attr('e_id');
    var typeEquipment = $(this).attr('typeEquipment');



    $('#e_pic').val(pic);
    $('#e_name_typeEquipment').val(name_type);
    $('#e_name_equipment').val(name_equipment);
    $('#e_count').val(count);
    $('#e_staff').val(e_staff);
    $('#e_teacher').val(e_teacher);
    $('#e_detail').val(detail);
    $('#e_id').val(e_id);
    $('#e_typeEquipment').val(typeEquipment);


    var u = document.getElementById('ucheck');
    var a = document.getElementById('adcheck');
    var t = document.getElementById('tcheck');


    if (e_user == true) {
      u.checked = true;
    } else {
      u.checked = false;
    }
    if (e_staff == true) {
      a.checked = true;
    } else {
      a.checked = false;
    }
    if (e_teacher == true) {
      t.checked = true;
    } else {
      t.checked = false;
    }

  });
</script>
</body>
</html>
