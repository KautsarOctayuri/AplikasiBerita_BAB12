<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbnm = "pw_2212010002";

$conn = mysqli_connect($host, $user, $pass);
if ($conn) {
 $buka = mysqli_select_db($conn,$dbnm);
 if (!$buka) {
 die ("Database tidak dapat dibuka");
 }
 } else {
 die ("Server MySQL tidak terhubung");
 }
 ?>