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
