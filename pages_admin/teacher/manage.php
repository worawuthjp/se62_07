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
if (isset($_POST['edit'])) {
    $id = $_POST['e_idTeacher'];
    $Ttitle = $_POST['e_Ttitle'];
    $Tfname = $_POST['e_Tfname'];
    $Tlname = $_POST['e_Tlname'];
    $email = $_POST['e_email'];

    $sql = "UPDATE teacher SET `Ttitle` = '$Ttitle', `Tfname` ='$Tfname', `Tlname` = '$Tlname' , `email`='$email',`isDelete` = 0 WHERE `id_teacher` = '$id'";
    updateData($sql);
    header("location:./teacher.php");
}
if (isset($_POST['add'])) {
    $Ttitle = $_POST['Ttitle'];
    $Tfname = $_POST['Tfname'];
    $Tlname = $_POST['Tlname'];
    $email = $_POST['email'];

    $sql = "INSERT INTO teacher (`id_teacher`,`Ttitle`,`Tfname`,`Tlname`,`email`,`isDelete`) 
    VALUES ( NULL,'$Ttitle','$Tfname','$Tlname','$email',0)";
    addinsertData($sql);
    header("location:./teacher.php");
}