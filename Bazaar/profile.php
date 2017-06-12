<?php

use Bazaar\Classes\Company;
use Bazaar\Classes\Offer;
use Bazaar\Classes\User;

include_once 'start.php';

session_start();
$page = "profiel";

if(isset($_SESSION['userID'])) {

    $user = new User();
    $user->getUserData($_SESSION['userID']);

    $offerCompany = new Company();

    $offer = new Offer();

    $participatingOffers = "";
    if($offer->getParticipatingOffers($user->getUserID()) == null){
        $participatingOffers = null;
    } else {
        $participatingOffers = $offer->getParticipatingOffers($user->getUserID());
    }
} else if (isset($_SESSION['companyID'])){
    header('Location: Bazaar/company.php');
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
    <link rel="stylesheet" href="css/profile.css">
    <title>profiel</title>
</head>
<body>
    <?php include_once 'nav.inc.php'?>

    <section class="profileHeader">

        <?php if($user->getAvatar() == null):?>

            <div class="defaultProfile">
                <p class="initials"><?php echo substr($user->getFirstname(), 0, 1).substr($user->getLastname(), 0, 1);?></p>
            </div>

        <?php else:?>

            <img class="profilePic" src="<?php echo $user->getAvatar();?>" alt="<?php echo $user->getFirstname() . " " . $user->getLastname();?>'s avatar">

        <?php endif;?>

        <h1><?php echo $user->getFirstname() . " " . $user->getLastname();?></h1>

    </section>

    <section class="main">

        <div class="profileInfo">

            <h2>Email</h2>
            <p><?php echo $user->getEmail()?></p>

            <h2>Verjaardag</h2>

            <?php if($user->getBirthday() == null):?>

                <p>nog niet ingevuld</p>

            <?php else: ?>

                <p><?php echo $user->getBirthday()?></p>

            <?php endif;?>

        </div>

        <div class="offerButtons">

            <button id="participating" class="active">mijn deelnames</button>
            <button id="recommendations" >aanbevolen</button>

        </div>

        <ul class="participatingOffers">

            <?php if ($participatingOffers == null):?>

                <h3>je hebt nog geen deelnames</h3>

            <?php else:?>

                <?php foreach($participatingOffers as $key => $o):?>

                    <?php $offer->getOfferData($o['offer_id'])?>

                    <a href="<?php echo BASE_URL . 'Bazaar/offer.php?offerid=' . $o['offer_id'];?>">
                        <li class="offer">

                            <div class="logo">
                                <div class="overlay"></div>
                                <img src="<?php $offerCompany->getCompanyData($offer->getCompanyID()); echo BASE_URL.'Bazaar/uploads/'.$offerCompany->getLogo()?>"
                                     alt="<?php echo $offerCompany->getCompanyname();?> logo"
                                     class="companyLogo">
                            </div>

                            <div class="info">
                                <h1><?php echo $offer->getTitle();?></h1>

                                <div class="earnings">
                                    <p class="amount"><?php echo $o['earnings'];?></p>
                                    <img src="img/coin.png" alt="coin">
                                </div>

                                <div class="dates">
                                    <h2>tot <span><?php echo date('m-d-Y', $offer->getEndDate());?></span></h2>
                                </div>

                                <button class="more"></button>

                            </div>
                        </li>
                    </a>

                <?php endforeach;?>

            <?php endif;?>

        </ul>

        <ul class="recommendedOffers">

            <h1>Geen aanbevelingen beschikbaar</h1>

        </ul>

        <a class="logout" href="logout.php">log uit</a>

    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var participatingButton = $('#participating');
            var recommendationsButton = $('#recommendations');

            var participatingOffers = $('.participatingOffers');
            var recommendedOffers = $('.recommendedOffers');

            participatingButton.on('click', function (e) {
                e.preventDefault();

                participatingButton.addClass('active');
                recommendationsButton.removeClass('active');

                participatingOffers.css({display: 'block'});
                recommendedOffers.css({display: 'none'});
            });

            recommendationsButton.on('click', function (e) {
                e.preventDefault();

                recommendationsButton.addClass('active');
                participatingButton.removeClass('active');

                recommendedOffers.css({display: 'block'});
                participatingOffers.css({display: 'none'});
            });
        });

    </script>

</body>
</html>