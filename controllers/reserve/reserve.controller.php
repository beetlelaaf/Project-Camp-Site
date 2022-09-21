<?php

session_start();

global $username;

if (!empty($_SESSION['username'])){
    $username = $_SESSION['username'];
    require 'views/global/navigation/navigation.user.view.php';
}
else{
    require 'views/global/navigation/navigation.view.php';
}
require 'models/reserve/reserve.php';


global $getRes;
$getReserv= new getReservation();
$getResv = $getReserv->getReservation();

global $reservations;
$reserv = new getReservation();
$amountofreservation = $reserv->getEmptyPLaces();






require 'views/reserve/reserve.view.php';
require 'views/global/footer/footer.view.php';
