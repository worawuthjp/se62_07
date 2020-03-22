<?php

session_start();
unset($_SESSION["Logon"]);
session_destroy();


echo "<h3 align=center>Logout เรียบร้อยแล้ว</h3>";

echo "<center>";
echo "<a href=login.html>เข้าสู่ระบบ (Login)</a>";
echo "</center>";

?>
