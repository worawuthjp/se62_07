<?php
require_once("../../dbConnect.php");
session_start();

if (isset($_POST['accept'])) {
    $id = $_POST['id'];
    $sqlUpdateCart = "UPDATE serial_number SET serial_number.status='ยังไม่คืน' WHERE serial_number.name_serial = '$id'";
    updateData($sqlUpdateCart);
}
if (isset($_POST['returnEQ'])) {
    $id = $_POST['id'];
    $curdate = date("Y-m-d");
    $sqlUpdateCart = "UPDATE serial_number SET serial_number.status='ไม่ได้ถูกยืม' WHERE serial_number.id_serial = '$id'";
    updateData($sqlUpdateCart);

    $sqlUpdateLog = "UPDATE log_borrow SET date_return ='$curdate' WHERE log_borrow.id_serial ='$id'";
    updateData($sqlUpdateLog);
}