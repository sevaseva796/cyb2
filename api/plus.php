<?php

session_start();
$user = $_SESSION["user"];


$x = $_REQUEST["x"];
$y = $_REQUEST["y"]; 

//Здесь имеются существенные нарушения безопасности
// 1. Слабый пароль 
// 2. Нарушение принципа наименьших привилегий - исправлено
// 3. Секрет в коде
//$conn = mysqli_connect("localhost:3306","root","","billing");
// Ниже эти проблемы исправлены
//include("c:\\params\\billing.php");
include("../../../params/billing.php");


$conn = mysqli_connect($db_server,$db_user,$db_pwd,"billing");
$sql = "INSERT INTO calcs( Number1, Number2, Operation, User) VALUES($x,$y,'plus','$user')";
//echo $sql;
mysqli_query($conn, $sql);

mysqli_close($conn);
$z = $x + $y;
echo $z;