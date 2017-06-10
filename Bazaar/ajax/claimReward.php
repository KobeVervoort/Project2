<?php

use Bazaar\Classes\User;

header('Content-Type: application/json');

include_once '../start.php';

if(!empty($_POST)){

    $user = new User();

    $user->setUserID($_POST['userID']);

    if($user->setReward($_POST['offerID'])){
        $feedback = [
            "code"      => 200,
            "message"   => "successfully claimed reward"
        ];
    } else {
        $feedback = [
            "code"      => 500,
            "message"   => "something went wrong"
        ];
    }

    echo json_encode($feedback);

}