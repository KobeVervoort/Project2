<?php

include_once 'start.php';

session_start();
$page = "offer";

if(isset($_SESSION['userID'])){

} else {

}

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,600,800" rel="stylesheet">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/offer.css">
    <title>Aanbiedingen</title>
</head>
<body>

    <?php include_once 'nav.inc.php';?>

</body>