<?php

include_once './core/db_connection.php';

global $error;

class login_model extends db_connection
{

    private array $account;

    public function __construct()
    {
        $this->account = array();
    }

    public function validate($email): string //Validating a user  (Used for login)
    {
        $sql = "SELECT password FROM users WHERE email = :email";

        try  // Getting the password from the database using the email
        {
            $stmt = $this->connect()->prepare($sql); 
            $stmt->execute([':email' => $email]);
            $pass = "";
            while ($row = $stmt->fetch()) { // Fetch into an array
                $pass = $row['password']; // Get the password from the array
            }
            return $pass; // Return password to the controller
        } 
        catch (PDOException $error) //Any PDO exception is caught
        { 
            throw $error; // Throw Error
        }
    }

    public function login($email, $password)
    {
        try
        {
            $sql = "SELECT userId, role, username FROM users WHERE email = :email AND password = :password"; // Get UserID and username form the database based on the password and email.
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([':email' => $email, ':password' => $password]);
            while ($row = $stmt->fetch())
            {
                array_push($this->account, $row['userId'], $row['role'], $row['username']); // Push the values of userId and username into an array.
            }
            return $this->account; // Return the array to the controller 
        } 
        catch (PDOException $error)  //Any PDO exception is caught
        {
            throw $error; // Throw Error
        }
    }
}