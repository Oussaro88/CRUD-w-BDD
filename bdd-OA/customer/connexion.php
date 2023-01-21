<?php

$db_host = "localhost:3307";
$db_username = "root";
$db_password = "";
$db_name = "db_oa";


$conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
$conn->exec("set names utf8");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
