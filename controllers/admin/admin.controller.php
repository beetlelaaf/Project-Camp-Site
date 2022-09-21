<?php
    session_start();

    require 'models/admin/admin.model.php';

    global $error, $users, $reservations;

    $admin_model = new admin_model();


    if (!empty($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        if($_SESSION['role'] == 5) 
        {
            $users = $admin_model->getUsers();
            $reservations = $admin_model->getReservations();

            require 'views/global/navigation/navigation.admin.view.php';
            require 'views/admin/admin.view.php';
        } 
        else 
        {
            require 'views/global/navigation/navigation.user.view.php';
            header("Location: /home");
        }   
    }
    else
    {
        require 'views/global/navigation/navigation.view.php';
        header("Location: /home");
    }   
    
    require 'views/global/footer/footer.view.php';
    
