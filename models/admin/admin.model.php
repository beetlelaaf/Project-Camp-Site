<?php

include_once './core/db_connection.php';

class admin_model extends db_connection
{
    private array $users, $reservations;

    public function __construct()
    {
        $this->users = array();
        $this->reservations = array();
    }

    public function getReservations()  // Validating if the user exists (Used for registration)
    {
        $sql = 
        "SELECT users.name, users.lastname, campingplace.place_id, campingplace.price, persons, arrival_date, departure_date FROM reservation
         JOIN campingplace ON camping_place = place_id
         JOIN users ON user_id = userId";

        try {
            $stmt = $this->connect()->prepare($sql); //prepare statement

            $stmt->execute(); // Execute

            while($row = $stmt->fetch())
            {
                array_push($this->reservations, array(
                    $row['name'] . " " . $row['lastname'],
                    $row['place_id'],
                    $row['persons'],
                    $row['arrival_date'],
                    $row['departure_date'],
                    $row['price']
                ));
            }

            return $this->reservations;

        } catch (PDOException $error) { //Any PDO exception is caught
            throw $error; // Throw error 
        }  
    }

    public function getUsers(){

        $sql = "SELECT * FROM users";

        try {
            $stmt = $this->connect()->prepare($sql); //prepare statement

            $stmt->execute(); // Execute

            while($row = $stmt->fetch()) 
            {
                array_push($this->users, array(
                $row['name'] . " " . $row['lastname'], //concatinate to make full name
                $row['street'],
                $row['housenumber'],  
                $row['zipcode'], 
                $row['username'], 
                $row['email']
                )); 
            }

            return $this->users;
                
        } catch (PDOException $error) { //Any PDO exception is caught
            throw $error; // Throw error 
        }
    }
}