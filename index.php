<?php
use Bazaar\Classes\Company;
use Bazaar\Classes\Offer;
use \Bazaar\Classes\User;

include_once 'Bazaar/start.php';

session_start();
$page = "tribune";

if(isset($_SESSION['userID'])){

    $offer = new Offer();
    $offers = $offer->getPromotedOffers();

    $offerCompany = new Company();

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
    <link rel="stylesheet" href="Bazaar/css/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,600,800" rel="stylesheet">
    <link rel="stylesheet" href="Bazaar/css/nav.css">
    <link rel="stylesheet" href="Bazaar/css/index.css">

    <title>home</title>
</head>
<body>
    <?php include_once 'Bazaar/nav.inc.php';?>

    <section class="main">

        <div class="offers">

            <?php foreach ($offers as $key => $o):?>

                <a href="<?php echo BASE_URL . 'Bazaar/offer.php?offerid=' . $o['id'];?>" class="offer">

                    <div class="overlay"></div>
                        <img src="<?php $offerCompany->getCompanyData($o['company_id']); echo BASE_URL.'Bazaar/uploads/'.$offerCompany->getLogo()?>"
                             alt="<?php echo $offerCompany->getCompanyname();?> logo"
                             class="companyLogo">

                    <div class="offerInfo">

                        <h1><?php echo $o['title'];?></h1>

                        <div class="price">
                            <p class="amount"><?php echo $o['coins'];?></p>
                            <img src="Bazaar/img/coin.png" alt="coin">
                            <p>te verdienen</p>
                        </div>

                    </div>

                </a>

            <?php endforeach ;?>

        </div>

        <button class="allOffers">bekijk alle aanbiedingen</button>
    </section>

    <div class="superFans">
        <div class="superFansBackground"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>