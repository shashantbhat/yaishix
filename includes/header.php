<?php

require_once("includes/config.php");
require_once("includes/classes/PreviewProvider.php");
require_once("includes/classes/entity.php");
require_once("includes/classes/categoryContainers.php");

if(!isset($_SESSION["userLoggedIn"])){
    header("Location: register.php");
}

else {
    echo "welcome to Yaishix"."<br>";
}

$userLoggedIn = $_SESSION["userLoggedIn"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="assets/style/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0b1218a7e1.js" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</head>
<body>
    <div class ='wrapper'>

