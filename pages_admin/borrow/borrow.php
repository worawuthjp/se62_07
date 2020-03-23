<?php
?>
<!DOCTYPE html>
<html>
<?php session_start();
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
  $sql_tableSend = "SELECT user.idKU,user.title,user.fname,user.lname,serial_number.name_serial,equipment.name_equipment ,serial_number.status ,cart.start_borrow FROM serial_number INNER JOIN equipment on equipment.id_equipment = serial_number.id_equipment
  INNER JOIN cart on cart.id_equipment = equipment.id_equipment
  INNER JOIN user ON user.id_user = cart.id_user
  WHERE serial_number.status = 'รอมารับของ'
  GROUP BY serial_number.name_serial";
  $tableSend = selectData($sql_tableSend);

  $sql_tableReturn = "SELECT serial_number.id_serial,user.idKU,user.title,user.fname,user.lname,serial_number.name_serial,equipment.name_equipment ,serial_number.status FROM serial_number INNER JOIN equipment on equipment.id_equipment = serial_number.id_equipment
  INNER JOIN cart on cart.id_equipment = equipment.id_equipment
  INNER JOIN user ON user.id_user = cart.id_user
  WHERE serial_number.status = 'ยังไม่คืน'
  GROUP BY serial_number.name_serial";
  $tableReturn = selectData($sql_tableReturn);

  ?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css.map">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
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
                <!--1-->
                <div class="modal fade" id="modal-request">
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
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-secondary active " id="colorButton1"
                                                        style="background-color: green;cursor:pointer;">
                                                        <input type="checkbox" name="options" id="option1"
                                                            autocomplete="off" onchange="activeButton()" checked> Active
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2222</td>
                                            <td>
                                                Raspberry Pi
                                            </td>
                                            <td>Embedded</td>
                                            <td> 3</td>
                                            <td>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-secondary active " id="colorButton2"
                                                        style="background-color: green;cursor:pointer;">
                                                        <input type="checkbox" name="options" id="option2"
                                                            autocomplete="off" onchange="activeButton()" checked> Active
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>12580</td>
                                            <td>
                                                Monitor
                                            </td>
                                            <td>อุปกรณ์คอม</td>
                                            <td> 1</td>
                                            <td>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-secondary active " id="colorButton3"
                                                        style="background-color: green;cursor:pointer;">
                                                        <input type="checkbox" name="options" id="option3"
                                                            autocomplete="off" onchange="activeButton()" checked> Active
                                                    </label>
                                                </div>
                                            </td>
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
                </div>
                <!--2-->
                <div class="modal fade" id="modal-giveback">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">รายการอุปกรณ์ที่กำลังยืม</h4>
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
                                            <th>ยืนยันการคืน</th>
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
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-secondary active " id="confirm_Color"
                                                        style="background-color: green;cursor:pointer;">
                                                        <input type="checkbox" name="options" id="confirm1"
                                                            autocomplete="off" onchange="confirmButton()" checked>
                                                        ยืนยัน
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2222</td>
                                            <td>
                                                Raspberry Pi
                                            </td>
                                            <td>Embedded</td>
                                            <td> 3</td>
                                            <td>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-secondary active " id="confirm_Color2"
                                                        style="background-color: green;cursor:pointer;">
                                                        <input type="checkbox" name="options" id="confirm2"
                                                            autocomplete="off" onchange="confirmButton()" checked>
                                                        ยืนยัน
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>12580</td>
                                            <td>
                                                Monitor
                                            </td>
                                            <td>อุปกรณ์คอม</td>
                                            <td> 1</td>
                                            <td>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-secondary active " id="confirm_Color3"
                                                        style="background-color: green;cursor:pointer;">
                                                        <input type="checkbox" name="options" id="confirm3"
                                                            autocomplete="off" onchange="confirmButton()" checked>
                                                        ยืนยัน
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">ยืนยันการคืน</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--End Modal Form-->
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
                                            <th>รหัสผู้ยืม</th>
                                            <th>ชื่อผู้ยืม</th>
                                            <th>เลขครุภัณฑ์</th>
                                            <th>ชื่ออุปกรณ์</th>
                                            <th>วันที่ยืม</th>
                                            <th>การส่งมอบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < $tableSend[0]['numrow']; $i++) { ?>
                                        <tr>
                                            <td><?php echo $tableSend[$i + 1]['idKU'] ?>
                                            </td>
                                            <td>
                                                <?php echo $tableSend[$i + 1]['title'] ?>
                                                <?php echo $tableSend[$i + 1]['fname'] ?>
                                                <?php echo $tableSend[$i + 1]['lname'] ?>
                                            </td>
                                            <td><?php echo $tableSend[$i + 1]['name_serial'] ?>
                                            </td>
                                            <td><?php echo $tableSend[$i + 1]['name_equipment'] ?></td>
                                            <td><?php echo $tableSend[$i + 1]['start_borrow'] ?></td>
                                            <td>
                                                <div class="btn-group btn-group-toggle col-md-7"
                                                    data-target="#modal-request">
                                                    <button type="button" class="btn btn-block btn-warning"
                                                        onclick="accept('<?php echo $tableSend[$i + 1]['name_serial'] ?>')"
                                                        style="font-weight: bold;font-size: 14px">
                                                        รอมารับของ
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
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
                                            <th>รหัสผู้ยืม</th>
                                            <th>ชื่อผู้ยืม</th>
                                            <th>เลขครุภัณฑ์</th>
                                            <th>ชื่ออุปกรณ์</th>
                                            <th>ยืนยันการคืน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < $tableReturn[0]['numrow']; $i++) { ?>
                                        <tr>
                                            <td><?php echo $tableReturn[$i + 1]['idKU'] ?>
                                            </td>
                                            <td>
                                                <?php echo $tableReturn[$i + 1]['title'] ?>
                                                <?php echo $tableReturn[$i + 1]['fname'] ?>
                                                <?php echo $tableReturn[$i + 1]['lname'] ?>
                                            </td>
                                            <td><?php echo $tableReturn[$i + 1]['name_serial'] ?>
                                            </td>
                                            <td><?php echo $tableReturn[$i + 1]['name_equipment'] ?></td>
                                            <td>
                                                <div class="btn-group btn-group-toggle col-md-7"
                                                    data-target="#modal-request">
                                                    <button type="button" class="btn btn-block btn-primary"
                                                        onclick="returnEQ('<?php echo $tableReturn[$i + 1]['id_serial'] ?>')"
                                                        style="font-weight: bold;font-size: 14px">
                                                        กำลังยืม
                                                    </button>
                                                </div>
                                            </td>
                                            <!-- <td>
                                                <div class="btn-group btn-group-toggle col-md-7" data-toggle="modal"
                                                    data-target="#modal-giveback">
                                                    <button type="button" class="btn btn-block btn-primary"
                                                        style="font-weight: bold;font-size: 14px">
                                                        กำลังยืม
                                                    </button>
                                                </div>
                                            </td> -->
                                        </tr>
                                        <?php } ?>

                                        <!-- <tr>
                                            <td>6020503887_03</td>
                                            <td>
                                                6020503887
                                            </td>
                                            <td>วรวุฒิ พันธุสิทธิ์เสรี</td>
                                            <td> 3</td>
                                            <td>
                                                <div class="btn-group btn-group-toggle col-md-7" data-toggle="modal"
                                                    data-target="#modal-giveback">
                                                    <button type="button" class="btn btn-block btn-danger"
                                                        style="font-weight: bold;font-size: 14px">
                                                        เกินกำหนดเวลา
                                                    </button>
                                                </div>
                                            </td>
                                        </tr> -->
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

    @javascript
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

    <!--javascript function-->
    <script>
    $(function() {
        $('#requestTable')
            .DataTable({
                'responsive': true,
                'autoWidth': false
            })
        $('#returnthing')
            .DataTable({
                'responsive': true,
                'autoWidth': false
            })
    })

    function activeButton() {
        var checkBox = document.getElementById('option1')
        var colorBotton = document.getElementById('colorButton1')
        if (checkBox.checked == true) {
            colorBotton.style.backgroundColor = 'green'
        } else {
            colorBotton.style.backgroundColor = '#4f5154'
        }

        checkBox = document.getElementById('option2')
        colorBotton = document.getElementById('colorButton2')
        if (checkBox.checked == true) {
            colorBotton.style.backgroundColor = 'green'
        } else {
            colorBotton.style.backgroundColor = '#4f5154'
        }

        checkBox = document.getElementById('option3')
        colorBotton = document.getElementById('colorButton3')
        if (checkBox.checked == true) {
            colorBotton.style.backgroundColor = 'green'
        } else {
            colorBotton.style.backgroundColor = '#4f5154'
        }

    }

    function confirmButton() {
        var checkBox = document.getElementById('confirm1')
        var colorBotton = document.getElementById('confirm_Color')
        if (checkBox.checked == true) {
            colorBotton.style.backgroundColor = 'green'
        } else {
            colorBotton.style.backgroundColor = '#4f5154'
        }

        checkBox = document.getElementById('confirm2')
        colorBotton = document.getElementById('confirm_Color2')
        if (checkBox.checked == true) {
            colorBotton.style.backgroundColor = 'green'
        } else {
            colorBotton.style.backgroundColor = '#4f5154'
        }

        checkBox = document.getElementById('confirm3')
        colorBotton = document.getElementById('confirm_Color3')
        if (checkBox.checked == true) {
            colorBotton.style.backgroundColor = 'green'
        } else {
            colorBotton.style.backgroundColor = '#4f5154'
        }

    }

    function accept(id) {
        swal({
                title: "คุณแน่ใจที่จะยืนยันการส่งมอบใช่มั้ย?",
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
                accept_1(id);
                setTimeout(function() {
                    location.reload();
                }, 1500);
            });
    }

    function accept_1(id1) {
        alert(id1 + " ");
        $.ajax({
            type: "POST",
            data: {
                id: id1,
                accept: "accept"
            },
            url: "./manage.php",
            async: false,
            success: function(result) {}
        });
    }

    function returnEQ(id) {
        swal({
                title: "คุณแน่ใจที่จะยืนยันการรับของใช่มั้ย?",
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
                returnEQ_1(id);
                setTimeout(function() {
                    location.reload();
                }, 1500);
            });
    }

    function returnEQ_1(id1) {
        alert(id1 + " ");
        $.ajax({
            type: "POST",
            data: {
                id: id1,
                returnEQ: "returnEQ"
            },
            url: "./manage.php",
            async: false,
            success: function(result) {}
        });
    }
    </script>
    <!--End javascript Function-->
</body>

</html>