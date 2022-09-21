<?php 

require 'models/login/login.model.php';

global $error, $succes;

$login_model = new login_model();


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    session_start();
    if(isset($_POST['login']) && !empty($_POST['email']))  // Check if the email is filled in 
    {
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // Check if the email is valid 
        {
            if(!empty($_POST['password'])) // Check if the password is filled in 
            {
                if(!empty($login_model->validate($_POST['email'])))  // Check if there is a password bonded to the email
                {
                    $userpass = $login_model->validate($_POST['email']); // Put the hashed password in a variable (Used to login)
                    if(password_verify($_POST['password'], $userpass))  // Verify if correct password
                    {
                        if(!empty($login_model->login($_POST['email'], $userpass))) //Put the hashed password in since it has to compare it to the hashed password in the database
                        {
                            $account = $login_model->login($_POST['email'], $userpass); //Put the retrieved data into a variable (Username and ID)
                            $_SESSION['user_id'] = $account[0];
                            $_SESSION['role'] = $account[1];
                            $_SESSION['username'] = $account[2];
                            
                            if(!empty($_SESSION['user_id']) && !empty($_SESSION['username'])) 
                            {
                                $succes = "Login was succesful!";
                                ?>
                                <meta http-equiv="refresh" content="0.5;url=/home">
                                <?php
                            }
                            else 
                            {
                                $error = "Something went wrong while trying to log you in, please try again";
                            }
                        }
                        else 
                        {
                            $error = "Account doesn't exists";
                        }
                    }
                    else 
                    {
                        $error = "Incorrect password.";
                    }               
                }
                else
                {
                    $error = "No password set!";
                }
            }
            else 
            {
                $error = "No password filled in!";
            }
        }
        else 
        {
            $error = "Not a valid email!";
        }
    }
    else
    {
        $error = "No e-mail filled in!";
    }
}




require 'views/global/navigation/navigation.view.php';
require 'views/login/login.view.php';
require 'views/global/footer/footer.view.php';