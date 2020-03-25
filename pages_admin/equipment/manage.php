<?php
require_once('../../dbConnect.php');


if (isset($_POST['delete'])) {
  $id = $_POST['Eid'];
  $sql = "UPDATE `equipment` SET `isDelete` = '1' WHERE `equipment`.`id_equipment` = '$id'";
  updateData($sql);

  $sqlUpdateSerial = "UPDATE serial_number SET serial_number.isDelete=1 WHERE serial_number.id_equipment = $id";
  updateData($sqlUpdateSerial);
}


if (isset($_POST['add'])) {
  $rnumber = $_POST['rnumber'];
  $rent = $_POST['rent'];
  $detail = $_POST['detail'];


  $sqluser = "INSERT INTO `room` (`rid`, `rnumber`, `rent`, `detail`, `status`, `isDelete`) VALUES (NULL, '$rnumber', '$rent', '$detail', 'ว่าง', '0')";
  echo $sqluser;
  addinsertData($sqluser);


  header("location:./room.php");
}
if (isset($_POST['edit'])) {
  $e_type = $_POST['e_type'];
  $e_name = $_POST['e_name'];
  $e_detail = $_POST['e_detail'];
  $adcheck = $_POST['adcheck'];
  $tcheck = $_POST['tcheck'];
  $ucheck = $_POST['ucheck'];
  $e_id = $_POST['e_id'];
  $e_typeEquipment = $_POST['id_typeEquipment'];
  if (isset($tcheck)) {
    $tcheck = 1;
  } else {
    $tcheck = 0;
  }
  if (isset($ucheck)) {
    $ucheck = 1;
  } else {
    $ucheck = 0;
  }
  if (isset($adcheck)) {
    $adcheck = 1;
  } else {
    $adcheck = 0;
  }

  $sqlroom = "UPDATE `equipment` SET `id_equipment` = '$e_id', `name_equipment` = '$e_name', `e_teacher` = '$tcheck', `e_user` = '$ucheck', `e_staff` = '$adcheck', `id_typeEquipment` = '$e_typeEquipment', `detail` = '$e_detail' WHERE `equipment`.`id_equipment` = $e_id";
  echo $sqlroom;
  updateData($sqlroom);



  header("location:./name_equipment.php");
}

