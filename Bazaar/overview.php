<?php

use Bazaar\Classes\Company;
use Bazaar\Classes\Offer;

include_once 'start.php';

$page = 'overview';
session_start();

if(isset($_SESSION['companyID'])){
    $offer = new Offer();
    $offers = $offer->getAllOffers();

    $offerCompany = new Company();
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
    <link rel="stylesheet" href="css/offers.css">
    <title>Aanbiedingen</title>
</head>
<body>
<?php include_once 'nav.inc.php'?>

<section class="main">

    <ul class="offers">

        <?php foreach($offers as $key => $o):?>

            <li class="offer">
                <div class="flipper">
                    <div class="front">
                        <div class="logo">
                            <div class="overlay"></div>

                            <?php $offerCompany->getCompanyData($o['company_id'])?>

                            <?php if($offerCompany->getLogo() != null):?>

                            <img src="<?php echo BASE_URL.'Bazaar/uploads/'.$offerCompany->getLogo()?>"
                                 alt="<?php echo $offerCompany->getCompanyname();?> logo"
                                 class="companyLogo">

                            <?php endif;?>

                        </div>

                        <div class="info">
                            <h1><?php echo $o['title'];?></h1>

                            <div class="dates">
                                <h2>van <span><?php echo date('d-m-Y', $o['start_date']);?></span></h2>
                                <h2>van <span><?php echo date('d-m-Y', $o['end_date']);?></span></h2>
                            </div>

                            <div class="price">
                                <p class="amount"><?php echo $o['coins'];?></p>
                                <img src="img/coin.png" alt="coin">
                                <p>te verdienen</p>
                            </div>

                            <button class="more"></button>

                        </div>
                    </div>
                    <div class="back">
                        <h1><?php echo $o['title'];?></h1>
                        <div class="companyInfo">
                            <div class="logoContainer">
                                <img src="<?php $offerCompany->getCompanyData($o['company_id']); echo BASE_URL.'Bazaar/uploads/'.$offerCompany->getLogo()?>"
                                     alt="<?php echo $offerCompany->getCompanyname();?> logo"
                                     class="companyLogo">
                            </div>

                            <div class="infoContainer">
                                <h2><?php echo $offerCompany->getCompanyname()?></h2>
                                <p><?php echo $offerCompany->getAddress();?></p>
                                <p><?php echo $offerCompany->getCity();?></p>
                            </div>
                        </div>

                        <div class="offerInfo">
                            <div class="description">
                                <h3>Aanbieding</h3>
                                <p><?php echo $offer->shortenDescription($o['description']);?></p>
                            </div>
                            <div class="dates">
                                <h3>Van</h3>
                                <p><?php echo date('d-m-Y', $o['start_date']);?></p>
                                <h3>Tot</h3>
                                <p><?php echo date('d-m-Y', $o['end_date']);?></p>
                            </div>
                        </div>
                    </div>
                </div>

            </li>

        <?php endforeach;?>

    </ul>

</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('.offers').on('click', function (e) {
            $(event.target).closest('li').toggleClass('flip');
        })
    })
</script>

</body>
</html>