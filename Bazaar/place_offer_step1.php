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

    $startDate = $endDate = $value = $participations = $placement = '';

    if(!empty($_SESSION['startDate'])) {
        $startDate = $_SESSION['startDate'];
        $endDate = $_SESSION['endDate'];
        $value = $_SESSION['value'];
        $participations = $_SESSION['participations'];
        $placement = $_SESSION['placement'];
    }

    if(!empty($_POST)){
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        $startDateConverted = strtotime($startDate);
        $endDateConverted = strtotime($endDate);
        $value = $_POST['value'];
        $participations = $_POST['participations'];
        $placement = $_POST['place'];

        if($startDateConverted == '' || $endDateConverted == ''){
            $dateError = 'Je kan dit niet leeglaten';
        } else if ($startDateConverted >= $endDateConverted) {
            $dateError = 'einddatum met later zijn dan startdatum';
        } else {
            $startDateConverted = date('Y-m-d', $startDateConverted);
            $endDateConverted = date('Y-m-d', $endDateConverted);
        }

        if($value == ''){
            $valueError = 'Je kan dit niet leeglaten';
        }

        if($participations == ''){
            $participationsError = 'Je kan dit niet leeglaten';
        }

        if($dateError == '' && $valueError == '' && $participationsError == ''){
            $_SESSION['startDate'] = $startDateConverted;
            $_SESSION['endDate'] = $endDateConverted;
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
                        <input type="date" id="startDate" class="dateInput" name="startDate" value="<?php echo $startDate?>">
                    </div>

                    <div>
                        <label for="endDate">tot</label>
                        <br>
                        <input type="date" id="endDate" class="dateInput" name="endDate" value="<?php echo $endDate?>">
                    </div>

                </div>

                <p class="errorMessage"><?php echo $dateError?></p>

                <div class="value">

                    <label for="price">waarde</label>
                    <span><input type="number" id="price" name="value" min="1" max="9999" value="<?php echo $value?>">coins</span>
                    <p id="euro">&euro;<?php echo $value * 1.5?></p>

                    <p class="errorMessage"><?php echo $valueError?></p>

                </div>

                <div class="participations">

                    <label for="participationsNumber">maximum deelnames per supporter</label>
                    <span><input type="number" id="participationsNumber" name="participations" min="1" max="15" value="<?php echo $participations?>">deelnames</span>

                    <p class="errorMessage"><?php echo $participationsError?></p>

                </div>

                <div class="placement">

                    <h2>plaatsing</h2>

                    <div>
                        <input type="radio" name="place" value="list" id="list" <?php if($placement == '' || $placement == 'list'){echo 'checked';};?>>
                        <label for="list"><span><span></span></span>Aanbiedingenlijst (&euro;10)</label>
                    </div>
                    <div>
                        <input type="radio" name="place" value="listHome" id="listHome" <?php if($placement == 'listHome'){echo 'checked';};?>>
                        <label for="listHome"><span><span></span></span>Homepagina + aanbiedingenlijst (&euro;30)</label>
                    </div>

                </div>

                <button type="submit">Naar offerte</button>
            </form>
        </div>

    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>

        $(document).ready(function(){
            var price = $('#price');
            var euro = $('#euro');

            price.on('keyup', function (e) {
                euro.html('&euro;' + (price.val()*1.5));
            })
        });

    </script>

</body>
</html>