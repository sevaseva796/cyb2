<?php

$pwd="123456";
$hash_pwd = hash("sha256", $pwd);
echo $hash_pwd;