<?php

$x = $_REQUEST["x"];
$y = $_REQUEST["y"]; 

//Здесь имеются существенные нарушения безопасности
// 1. Слабый пароль 
// 2. Нарушение принципа наименьших привилегий
// 3. Секрет в коде
$conn = mysqli_connect("localhost:3306","root","","billing");

$sql = "INSERT INTO calcs( Number1, Number2, Operation) VALUES($x, $y, 'minus')";
//echo $sql;
mysqli_query($conn, $sql);

mysqli_close($conn);
$z = $x - $y;
echo $z;