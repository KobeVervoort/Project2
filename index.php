<?php
use \Bazaar\Classes\User;

include_once 'Bazaar/start.php';

session_start();
$page = "tribune";

if(isset($_SESSION['userID'])){

} else {
    header('Location: Bazaar/register.php');
}

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Bazaar/css/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Overpass:400,600" rel="stylesheet">
    <link rel="stylesheet" href="Bazaar/css/nav.css">
    <link rel="stylesheet" href="Bazaar/css/index.css">
    <title>home</title>
</head>
<body>
    <?php include_once 'Bazaar/header.inc.php';?>
    <?php include_once 'Bazaar/nav.inc.php';?>
    <section class="main">

    </section>
</body>
</html>