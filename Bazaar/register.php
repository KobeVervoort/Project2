<?php
use \Bazaar\Classes\User;
use \Bazaar\Classes\Vendor;

include_once 'start.php';

$page = 'login';

if(!empty($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($_POST['btnSubmit'] == 1){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
    } else {
        $vendor = new Vendor();
        $firstname = $_POST['firstnameBusiness'];
        $lastname = $_POST['lastnameBusiness'];
        $companyname = $_POST['companyname'];
        $vat = $_POST['vat'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $vendor->setEmail($email);
        $vendor->setPassword($password);
        $vendor->setCompanyname($companyname);
        $vendor->setVatNumber($vat);
    }
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
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>

    <section class="register">

        <form action="">

            <fieldset class="firstStep">

                <h1>maak een profiel aan</h1>

                <label for="email">email</label>
                <input type="email" id="email" placeholder="email" autocomplete="new email" name="email">

                <label for="password">wachtwoord</label>
                <input type="password" id="password" placeholder="wachtwoord" autocomplete="new-password" name="password">

                <label for="confirmPassword">bevestig wachtwoord</label>
                <input type="password" id="confirmPassword" placeholder="bevestig wachtwoord" autocomplete="new-password" name="confirmPassword">

                <button id="next">volgende</button>

            </fieldset>

            <fieldset class="secondStep">

                <h1>ga verder als supporter of als handelaar</h1>

                <button id="buttonFan">supporter</button>

                <button id="buttonBusiness">handelaar</button>

                <button id="previous">vorige</button>

            </fieldset>

            <fieldset class="fanStep">

                <label for="firstname">voornaam</label>
                <input type="text" id="firstname" name="firstname" placeholder="voornaam">

                <label for="lastname">naam</label>
                <input type="text" id="lastname" name="lastname" placeholder="naam">

                <button type="submit" id="submitFan" value="1" name="btnSubmit">voltooi</button>

                <button id="previousTwo">vorige</button>

            </fieldset>

            <fieldset class="businessStep">

                <label for="firstnameBusiness">voornaam</label>
                <input type="text" id="firstnameBusiness" name="firstnameBusiness" placeholder="voornaam">

                <label for="lastnameBusiness">naam</label>
                <input type="text" id="lastnameBusiness" name="lastnameBusiness" placeholder="naam">

                <label for="companyname">bedrijfsnaam</label>
                <input type="text" id="companyname" name="companyname" placeholder="bedrijfsnaam">

                <label for="vat">BTW-nummer</label>
                <input type="number" id="vat" name="vat" placeholder="BTW-nummer">

                <button id="nextTwo">volgende</button>

                <button id="previousThree">vorige</button>

            </fieldset>

            <fieldset class="businessStepTwo">

                <label for="address">adres</label>
                <input type="text" id="address" name="address" placeholder="adres">

                <legend >deelgemeente</legend>

                <select name="city" id="city">
                    <option value="mechelen">mechelen</option>
                    <option value="heffen">heffen</option>
                    <option value="hombeek">hombeek</option>
                    <option value="leest">leest</option>
                    <option value="muizen">muizen</option>
                    <option value="walem">walem</option>
                </select>

                <button type="submit" id="submitBusiness" value="2" name="btnSubmit">voltooi</button>

                <button id="previousFour">vorige</button>

            </fieldset>

        </form>

    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/form.js"></script>

</body>
</html>