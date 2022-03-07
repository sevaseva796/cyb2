<?php

session_start();
$user = $_SESSION["user"];

$x = $_REQUEST["x"];
$y = $_REQUEST["y"]; 
date_default_timezone_set("Europe/Moscow");
$Log = date("Y-m-d H:i:s");
include("../../../params/billing.php");


$conn = mysqli_connect($db_server,$db_user,$db_pwd,"billing");
$sql = "INSERT INTO calcs( Number1, Number2, Operation, User, Timestamp) VALUES($x,$y,'minus','$user', '$Log')";
//echo $sql;
mysqli_query($conn, $sql);

mysqli_close($conn);
$z = $x - $y;
echo $z;