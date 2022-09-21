<?php

session_start();

global $username;

if (!empty($_SESSION['username']) && $_SESSION['role'] == 6)
{
    $username = $_SESSION['username'];
    require 'views/global/navigation/navigation.user.view.php';
}
else if(!empty($_SESSION['username']) && $_SESSION['role'] == 5)
{
    $username = $_SESSION['username'];
    require 'views/global/navigation/navigation.admin.view.php';
} 
else 
{
    require 'views/global/navigation/navigation.view.php';
}

require 'views/home/home.view.php';
require 'views/global/footer/footer.view.php';
