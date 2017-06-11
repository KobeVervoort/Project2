<?php
use Bazaar\Classes\Company;
use Bazaar\Classes\Offer;
use \Bazaar\Classes\User;

include_once 'start.php';

session_start();

$page = 'placeOffer';
$stepNumber = 4;

if(isset($_SESSION['companyID'])) {
    $title = $_SESSION['title'];
    $description = $_SESSION['description'];
    $startDate = $_SESSION['startDate'];
    $endDate = $_SESSION['endDate'];
    $value = $_SESSION['value'];
    $placement = $_SESSION['placement'];
    $totalPrice = $_SESSION['totalPrice'];

    if($placement == 'list'){
        $placement = 'aanbiedingenlijst';
        $placementPrice = 10;
    } else {
        $placement = 'Homepagina + aanbiedingenlijst';
        $placementPrice = 30;
    }

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

    <section class="main">

        <?php include_once 'steps.inc.php'?>

        <h1 class="fourthStepTitle">Aanbieding</h1>

        <div class="fourthStep">

            <h2>Titel</h2>
            <p><?php echo $title?></p>

            <h2>Beschrijving</h2>
            <p><?php echo $description?></p>

            <div class="dateAndPrice">
                <div>
                    <div id="startDateBlock">
                        <h2>van</h2>
                        <p><?php echo date('d-m-Y', strtotime($startDate))?></p>
                    </div>
                    <div id="endDateBlock">
                        <h2>tot</h2>
                        <p><?php echo date('d-m-Y', strtotime($endDate))?></p>
                    </div>
                </div>
                <div id="valueBlock">
                    <h2>Waarde</h2>
                    <p>&euro;<?php echo $value * 1.5?></p>
                </div>
            </div>

            <div id="placementBlock">
                <h2>Plaatsing</h2>
                <p id="placement"><?php echo $placement?></p>
            </div>

        </div>

        <h1 class="fourthStepTitle">Prijs</h1>

        <div class="fourthStep">

            <h2>totaal</h2>
            <p id="totalPrice">&euro;<?php echo $totalPrice?></p>

            <a href="offer_complete.php">Plaats aanbieding</a>

        </div>

    </section>

</body>
</html>