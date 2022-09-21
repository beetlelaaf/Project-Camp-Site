<?php

require 'models/register/register.model.php';

$pregmatch = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,32}$/";
global $error, $succes;

$register_model = new register_model();

if($_SERVER["REQUEST_METHOD"] == "POST") { // If there is a server request with method 'post' trigger this event
    // Double check if fields are all filled in.
    if (empty($_POST['username']) || empty($_POST['pass']) || empty($_POST['pass-repeat']) || empty($_POST['name'])
     || empty($_POST['lastname']) || empty($_POST['street']) || empty($_POST['housenumber']) || empty($_POST['zipcode'])
     || empty($_POST['email'])){

        $error = "Not all fields are filled in."; // If not all fields are filed in trigger error.
    } else {
        if(!$_POST['pass'] == $_POST['pass-repeat']) {
            $error = "Passwords doesn't match!";
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ // Validating the email.
            $error = "Not a valid email"; //trigger error if email is unvalid.
        }
    
        if ($register_model->UserExists($_POST['email']) != 0){ 
            if ($register_model->UserExists($_POST['email']) == 1){
                    $error = "Account already exists.";
            } else {
                    $error = "Error: Double registration, Something went wrong! Try again later";
            }
        } else {
            if (!preg_match($pregmatch, $_POST['pass'])){
                $error = "Password Must be 8 to 32 characters + 1 uppercase, 1 lowercase and 1 number";
            } 
            else {
                if ($register_model->register(6, $_POST['username'], password_hash($_POST['pass'], PASSWORD_DEFAULT), $_POST['name'], $_POST['lastname'], 
                $_POST['street'], $_POST['housenumber'], $_POST['zipcode'], $_POST['email']) == 0){
                    $succes = "U bent volledig geregistreerd";
                    ?>
                    <meta http-equiv="refresh" content="5;url=/login">
                    <?php
                }
            }
        }
    }
}



require 'views/global/navigation/navigation.view.php';
require 'views/register/register.view.php';
require 'views/global/footer/footer.view.php';