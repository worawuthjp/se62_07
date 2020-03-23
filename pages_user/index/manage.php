<?php
require_once("../../dbConnect.php");
session_start();

if (isset($_POST['accept'])) {
    $id = $_POST['id'];
    $num = $_POST['num'];
    $sql_idEquipment = "SELECT cart.id_equipment as id_equipment FROM cart WHERE cart.id_cart=1";
    $idEquipment = selectDataOne($sql_idEquipment);
    $idEM = $idEquipment['id_equipment'];

    $sql = "SELECT * FROM `serial_number`WHERE status='ไม่ได้ถูกยืม' AND id_status_broken=1 AND isDelete=0 AND id_equipment='$idEM' LIMIT $num";
    $serialNUM = selectData($sql);

    $sqlUpdateCart = "UPDATE cart SET cart.status_accept='ยืนยัน' WHERE cart.id_cart=$id";
    updateData($sqlUpdateCart);

    for ($i = 0; $i < $serialNUM[0]['numrow']; $i++) {
        $idSN = $serialNUM[$i + 1]['id_serial'];
        $sqlUpdate = "UPDATE serial_number SET serial_number.status='รอมารับของ' WHERE serial_number.id_serial='$idSN'";
        updateData($sqlUpdate);

        $sqlAddLog = "INSERT INTO log_borrow (`id_log_borrow`,`id_serial`,`id_cart`,`status`,`date_return`) 
        VALUES ( NULL,'$idSN', '$id', 'ยืนยัน', NULL )";
        addinsertData($sqlAddLog);
    }
}