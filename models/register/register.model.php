<?php

include_once './core/db_connection.php';

class register_model extends db_connection
{

    public function UserExists($email)  // Validating if the user exists (Used for registration)
    {
        $sql = "SELECT * FROM users WHERE email = :email";

        try {
            $stmt = $this->connect()->prepare($sql); //prepare statement
            $stmt->execute([':email' => $email]); //execute statement bind parameter given email -> email
            if ($stmt->rowCount() == 1) { // if 1 row is returned -> account exists
                    return 1;
            } else if ($stmt->rowCount() > 1) { // If more then 1 row is returned -> somethign went wrond (double registration)
                    return 2; 
            } else {
                    return; // If rows is returned -> account doesn't exists 
            }
        } catch (PDOException $error) { //Any PDO exception is caught
            throw $error; // Throw error 
        }   
    }

    public function register($role, $username, $password, $name, $lastname, $street, $housenumber, $zipcode, $email){

        $sql = "INSERT INTO users (role, username, password, name, lastname, street, housenumber, zipcode, email) 
        VALUES (:role, :username, :password, :name, :lastname, :street, :housenumber, :zipcode, :email)";

        try {
            $stmt = $this->connect()->prepare($sql); //Prepare insert statement

            $stmt->bindParam(":role", $role, PDO::PARAM_STR);
            $stmt->bindParam(":username", $username, PDO::PARAM_STR); //Bind all parameters
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":lastname", $lastname, PDO::PARAM_STR);
            $stmt->bindParam(":street", $street, PDO::PARAM_STR);
            $stmt->bindParam(":housenumber", $housenumber, PDO::PARAM_STR);
            $stmt->bindParam(":zipcode", $zipcode, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);

            $stmt->execute(); // Execute
            
            return 0; // Return if successful
                
        } catch (PDOException $error) {
            throw $error;
        }
    }
}