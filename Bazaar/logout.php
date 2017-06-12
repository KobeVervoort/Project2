<?php

include_once 'start.php';

session_start();
session_destroy();
header('Location: ' . BASE_URL . 'Bazaar/register.php');

?>