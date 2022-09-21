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


require 'views/about/about.view.php';
require 'views/global/footer/footer.view.php';