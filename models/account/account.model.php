<?php 

include_once './core/db_connection.php';

class account_model extends db_connection
{
    private array $account, $full_account;

    public function __construct()
    {
        $this->account = array();
        $this->full_account = array();
    }


    function validateUser($new_username)
    {
        $sql = "SELECT * FROM users WHERE username = :username";

        try {
            $stmt = $this->connect()->prepare($sql); //prepare statement
            $stmt->bindParam(":username", $new_username, PDO::PARAM_STR); // Bind parameter given new username -> new username
            
            $stmt->execute(); // Execute

            if($stmt->rowCount() > 0)
            {
                return 1; // If not successful return 1
            }
            else 
            {
                return 0; // If successful return 0
            }  

        } catch (PDOException $error) { //Any PDO exception is caught
            throw $error; // Throw error 
        }
    }

    function updateUser($new_username, $old_username)
    {
        $sql = "UPDATE users SET username = :new_username WHERE username = :old_username";

        try {
            $stmt = $this->connect()->prepare($sql); //prepare statement
            $stmt->bindParam(":new_username", $new_username, PDO::PARAM_STR); // Bind parameter given new username -> new username
            $stmt->bindParam(":old_username", $old_username, PDO::PARAM_STR); // Bind parameter given old username -> old username 
            
            $stmt->execute(); // Execute
            
            return 0; // If successful return 0

        } catch (PDOException $error) { //Any PDO exception is caught
            throw $error; // Throw error 
        }  
    }

    function getAccount($user_id)
    {
        $sql = "SELECT * FROM users WHERE userId = :userId";

        try {
            $stmt = $this->connect()->prepare($sql); //prepare statement
            $stmt->bindParam(":userId", $user_id, PDO::PARAM_STR); // Bind parameter given userId -> user_id

            $stmt->execute(); // Execute

            while ($row = $stmt->fetch())
            {   // Push the values of userId and username into an array.
                array_push($this->full_account, $row['username'], $row['email'], $row['name'],
                $row['lastname'],  $row['street'], $row['housenumber'], $row['zipcode']); 
            }

            return $this->full_account; // If successful return 0

        } catch (PDOException $error) { //Any PDO exception is caught
            throw $error; // Throw error 
        }
    }

    public function refreshAccount($user_id)
    {
        try
        {
            $sql = "SELECT userId, role, username FROM users WHERE userId = :userId"; //  Get username form the database.
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([':userId' => $user_id]);
            while ($row = $stmt->fetch())
            {
                array_push($this->account, $row['userId'], $row['username'], $row['role']); // Push the values of userId and username into an array.
            }
            return $this->account; // Return the array to the controller 
        } 
        catch (PDOException $error)  //Any PDO exception is caught
        {
            throw $error; // Throw Error
        }
    }
}