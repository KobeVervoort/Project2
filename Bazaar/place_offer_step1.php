<?php
use Bazaar\Classes\Company;
use Bazaar\Classes\Offer;
use \Bazaar\Classes\User;

include_once 'start.php';

session_start();

$page = 'placeOffer';
$stepNumber = 1;

if(isset($_SESSION['companyID'])){

    $dateError = $valueError = $participationsError = '';

    if(!empty($_POST)){
        $startDate = strtotime($_POST['startDate']);
        $endDate = strtotime($_POST['endDate']);
        $value = $_POST['value'];
        $participations = $_POST['participations'];
        $placement = $_POST['place'];

        if($startDate == '' || $endDate == ''){
            $dateError = 'Je kan dit niet leeg laten';
        } else if ($startDate >= $endDate) {
            $dateError = 'einddatum met later zijn dan startdatum';
        } else {
            $startDate = date('Y-m-d', $startDate);
            $endDate = date('Y-m-d', $endDate);
        }

        if($value == ''){
            $valueError = 'Je kan dit niet leeg laten';
        }

        if($participations == ''){
            $participationsError = 'Je kan dit niet leeg laten';
        }

        if($dateError == '' && $valueError == '' && $participationsError == ''){
            $_SESSION['startDate'] = $startDate;
            $_SESSION['endDate'] = $endDate;
            $_SESSION['value'] = $value;
            $_SESSION['participations'] = $participations;
            $_SESSION['placement'] = $placement;

            header('Location: place_offer_step2.php');
        }
    }

} else if (isset($_SESSION['userID'])){
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

        <div class="firstStep">
            <form action="" method="POST">
                <div class="date">

                    <div>
                        <label for="startDate">van</label>
                        <br>
                        <input type="date" id="startDate" class="dateInput" name="startDate">
                    </div>

                    <div>
                        <label for="endDate">tot</label>
                        <br>
                        <input type="date" id="endDate" class="dateInput" name="endDate">
                    </div>

                </div>

                <div class="value">

                    <label for="price">waarde</label>
                    <span><input type="number" id="price" name="value" min="1" max="9999">coins</span>
                    <p id="euro">&euro;</p>

                </div>

                <div class="participations">

                    <label for="participationsNumber">maximum deelnames per supporter</label>
                    <span><input type="number" id="participationsNumber" name="participations" min="1" max="15">deelnames</span>

                </div>

                <div class="placement">

                    <h2>plaatsing</h2>
                    <div>
                        <input type="radio" name="place" value="list" id="list" checked>
                        <label for="list"><span><span></span></span>Aanbiedingenlijst (&euro;10)</label>
                    </div>
                    <div>
                        <input type="radio" name="place" value="listHome" id="listHome">
                        <label for="listHome"><span><span></span></span>Homepagina + aanbiedingenlijst (&euro;30)</label>
                    </div>

                </div>

                <button type="submit">Naar offerte</button>
            </form>
        </div>


    </section>

</body>
</html>