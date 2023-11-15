<?php
ob_start();
session_start();

// date_default_timezone_set(Indian/Maldives);

try {
    $con = new PDO("mysql:dbname=yaishix;host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e) {
    exit("Connection failed: " . $e->getMessage());
}
?>