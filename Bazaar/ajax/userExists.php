<?php

header('Content-Type: application/json');

include_once '../start.php';

use \Bazaar\Classes\User;

if(!empty($_POST)){

    $user = new User();
    $user->setEmail($_POST['email']);

    if(!$user->userExists()){
        $feedback = [
            'code' => 200,
            'userExists' => false
        ];
    } else {
        $feedback = [
            'code' => 200,
            'userExists' => true
        ];
    }

    echo json_encode($feedback);

}