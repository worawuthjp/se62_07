<?php
if(isset($_POST['btnSend'])){
  $teacher = $_POST['teacherSelect'];
  $date = $_POST['dateSelect'];
  $reason = $_POST['reason'];
  $dateStr = explode(" - ",$date);
  $startDate = $dateStr;
  $endDate = $dateStr;

  $insertSQL = "INSERT INTO `cart` VALUE()";
  include "../../dbConnect.php";
  $update = updateData($insertSQL);
}
?>

