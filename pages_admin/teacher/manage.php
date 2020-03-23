<?php

require_once('../../dbConnect.php');
$action = $_POST['action'] ?? "";

if ($action = 'delete') {
    header('Content-Type: application/json');
    $arr = array();
    $arr['sss'] = 15;
    $Tid = $_POST['Tid'] ?? "";
    $sql = "UPDATE `teacher` SET `isDelete` = '1' WHERE `teacher`.`id_teacher` = $Tid";
    updateData($sql);
    echo json_encode($arr);
}
