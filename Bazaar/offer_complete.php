<?php
use Bazaar\Classes\Company;
use Bazaar\Classes\Offer;
use \Bazaar\Classes\User;

include_once 'start.php';

session_start();

$page = 'placeOffer';

if(isset($_SESSION['companyID'])) {

    $offer = new Offer();

    $offer->setCompanyID($_SESSION['companyID']);
    $offer->setStartDate(strtotime($_SESSION['startDate']));
    $offer->setEndDate(strtotime($_SESSION['endDate']));
    $offer->setTitle($_SESSION['title']);
    $offer->setDescription($_SESSION['description']);
    $offer->setCoins($_SESSION['participations']);
    $offer->setTotalCoins($_SESSION['value']);
    if($_SESSION['placement'] == 'listHome'){
        $offer->setPlacement(1);
    } else {
        $offer->setPlacement(0);
    }

    $offer->uploadOffer();

}  else if (isset($_SESSION['userID'])){
    header('Location: index.php');
} else {
    header('Location: Bazaar/register.php');
}
?><!doctype html>
<html lang="en">
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,600,800" rel="stylesheet">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/steps.css">
    <link rel="stylesheet" href="css/placeOffer.css">
    <title>Plaats uw aanbieding</title>
</head>
<body>
    <?php include_once 'nav.inc.php'?>
</body>
</html>