<?php
$dbHost = "localhost";
$dbName = "php_project";
$dbUser = "root";

$con = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
