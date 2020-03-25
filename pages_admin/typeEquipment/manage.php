<?php

require_once('../../dbConnect.php');
$action = $_POST['action'] ?? "";

if ($action = 'delete') {
    header('Content-Type: application/json');
    $arr = array();
    $arr['sss'] = 15;
    $Tid = $_POST['Tid'] ?? "";
    $sql = "UPDATE `type_Equipment` SET `isDelete` = '1' WHERE `type_Equipment`.`id_typeEquipment` = $Tid";
    updateData($sql);
    echo json_encode($arr);
}
if (isset($_POST['edit'])) {
    $id = $_POST['e_id_typeEquipment'];
    $Ename = $_POST['e_name_typeEquipment'];


    $sql = "UPDATE type_Equipment SET `name_typeEquipment` = '$Ename' WHERE `id_typeEquipment` = '$id'";
    updateData($sql);
    header("location:./typeEquipment.php");
}
if (isset($_POST['add'])) {
    $nameT = $_POST['name_typeEquipment'];

    $sql = "INSERT INTO `type_equipment` (`id_typeEquipment`, `name_typeEquipment`, `isDelete`) VALUES (NULL, '$nameT', 0)";
    addinsertData($sql);
    header("location:./typeEquipment.php");
}
