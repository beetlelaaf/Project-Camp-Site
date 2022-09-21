<?php
    session_start();

    require "models/account/account.model.php";

    global $username, $success, $error;

    $account_model = new account_model();

    if(empty($account_model->getAccount($_SESSION['user_id'])))
    {
        $error = "something went wrong couldn't retrieved account"; 
    }
    else
    {
        $full_account = $account_model->getAccount($_SESSION['user_id']);
    }   
    
    if (!empty($_SESSION['username']))
    {
        $username = $_SESSION['username'];      
        if($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            if(isset($_POST['update']))
            {
                if(!empty($_POST['old_username'] && !empty($_POST['new_username'])))
                {
                    if($_POST['old_username'] != $_POST['new_username'])
                    {
                        if(strlen($_POST['new_username']) <= 32 && strlen($_POST['new_username']) >= 3)
                        {
                            if($account_model->validateUser($_POST['new_username']) == 0)
                            {
                                if($account_model->updateUser($_POST['new_username'], $_POST['old_username']) == 0)
                                {
                                    $account = $account_model->refreshAccount($_SESSION['user_id']);
                                    session_unset();
    
                                    $_SESSION['user_id'] = $account[0];
                                    $_SESSION['role'] = $account[1];
                                    $_SESSION['username'] = $account[2];
    
                                    $success = 1;
                                    ?>
                                    <meta http-equiv="refresh" content="2">
                                    <?php
                                    
                                }
                                else
                                {
                                    $error = "Something went wrong with trying to find your account, please try again.";
                                }
                            }  
                            else
                            {
                                $error = "Username already taken.";
                            } 
                        }
                        else
                        {
                            $error = "Username must be between between 2 and 32 characters";
                        }
                    }
                    else 
                    {
                        $error = "Old and new username cannot be the same.";
                    }
                }
                else
                {
                    $error ="not all fiels are filled in.";
                }
            }
            else 
            {
                $error = "oops somthing went wrong, please try again.";
            }
        } 
        if($_SESSION['role'] == 5) 
        {
            require 'views/global/navigation/navigation.admin.view.php';
            require 'views/account/edit.account.view.php';
        } 
        else 
        {
            require 'views/global/navigation/navigation.user.view.php';
            require 'views/account/edit.account.view.php';
        }      
    }
    else
    {
        require 'views/global/navigation/navigation.view.php';
        header("Location: /home");
    }
    
    require 'views/global/footer/footer.view.php';
?>