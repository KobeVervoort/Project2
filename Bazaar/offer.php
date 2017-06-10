<?php

use Bazaar\Classes\Company;
use Bazaar\Classes\Offer;
use Bazaar\Classes\User;

include_once 'start.php';

session_start();
$page = "offer";

if(isset($_SESSION['userID'])){

    $offerID = $_GET['offerid'];

    $offer = new Offer();
    $offer->setOfferData($offerID);

    $offerCompany = new Company();
    $offerCompany->getCompanyData($offer->getCompanyID());

    $user = new User();
    $user->setUserID($_SESSION['userID']);

    $coins = $offer->getCoins();
    $awardedCoins = 0;

    if($user->isParticipating($offerID)){
        $rewards = $user->getRewards($offerID);
        $awardedCoins = $rewards['earnings'];
        $coins -= $awardedCoins;
    }

} else {

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
    <link rel="stylesheet" href="css/offer.css">
    <title>Aanbiedingen</title>
</head>
<body>

    <?php include_once 'nav.inc.php';?>

    <header>
        <div class="logoContainer">
            <img src="<?php $offerCompany->getCompanyData($offer->getCompanyID()); echo BASE_URL.'Bazaar/uploads/'.$offerCompany->getLogo()?>"
                 alt="<?php echo $offerCompany->getCompanyname();?> logo"
                 class="companyLogo">
        </div>

        <h1><?php echo $offer->getTitle(); ?></h1>

    </header>

    <section class="main">

        <h2>Aanbieding</h2>
        <p class="description"><?php echo $offer->getDescription() ;?></p>

        <div class="dates">
            <div>
                <h2>Van</h2>
                <p class="startDate"><?php echo $offer->getStartDate();?></p>
            </div>
            <div>
                <h2>Tot</h2>
                <p><?php echo $offer->getEndDate();?></p>
            </div>
        </div>

        <div class="coins">
            <?php for($i = 1; $i <= $awardedCoins; $i++):?>
                <div class="coinContainer" href="claimReward.php?offerid=<?php echo $offerID;?>">
                    <div class="coin">
                        <img src="img/coin.png" alt="">
                    </div>
                </div>
            <?php endfor ;?>
            <?php for($i = 1; $i <= $coins; $i++):?>
                <a class="coinContainer" href="claimReward.php?offerid=<?php echo $offerID;?>">

                    <div class="coin">
                        <div class="overlay"></div>
                        <img src="img/coin.png" alt="">
                    </div>
                </a>

            <?php endfor ;?>

        </div>


    </section>


</body>
</html>