<?php

include_once 'start.php';

session_start();

$page = 'controlPanel';

if(isset($_SESSION['companyID'])){

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
    <link rel="stylesheet" href="css/index.css">
    <title>Home</title>
</head>
<body>

<?php include_once 'nav.inc.php';?>

    <section class="main">

        <div class="controls">

            <a href="place_offer_step1.php" class="control" id="offerControl">

                <div class="overlay"></div>
                <img src="img/offerInactive.png" alt="plaatsen" class="controlIcon">

                <h1 class="controlName">Plaats Aanbieding</h1>

            </a>

            <a href="administration.php" class="control" id="editControl">

                <div class="overlay"></div>
                <img src="img/editInactive.png" alt="mijn aanbiedingen" class="controlIcon">

                <h1 class="controlName">Mijn Aanbiedingen</h1>

            </a>

            <a href="overview.php" class="control" id="overviewControl">

                <div class="overlay"></div>
                <img src="img/overviewInactive.png" alt="overzicht" class="controlIcon">

                <h1 class="controlName">Overzicht</h1>

            </a>

            <a href="company_profile.php" class="control" id="profileControl">

                <div class="overlay"></div>
                <img src="img/profileInactive.png" alt="profiel" class="controlIcon">

                <h1 class="controlName">Profiel</h1>

            </a>

        </div>

    </section>

<div class="superFans">

    <div class="superFansBackground"></div>

</div>
</body>
</html>