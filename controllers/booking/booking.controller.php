<?php

session_start();
require 'models/booking/booking.php';
global $username;

if (!empty($_SESSION['username'])){
    $username = $_SESSION['username'];
    require 'views/global/navigation/navigation.user.view.php';
}
else{
    require 'views/global/navigation/navigation.view.php';
}

require 'views/booking/booking.view.controller.php';
require 'views/global/footer/footer.view.php';
