<?php

require_once'core/db_connection.php';

class getReservation
{
    public function getReservation()
    {
        $getReservation = array();
        $dbconn2 = new db_connection();
        $stmt2 = $dbconn2->connect()->query("SELECT * FROM `reservation` WHERE arrival_date >= '2022-01-24' AND departure_date <= '2022-01-27'");
        while ($row = $stmt2->fetch()) {
            array_push($getReservation, array(
                $row['reservation_id'],
                $row['arrival_date'],
            ));
        }
        return $getReservation;
    }
    public function getEmptyPLaces()
    {


        $reserv = array();
        $dbconn = new db_connection();
        $stmt = $dbconn->connect()->query("SELECT * FROM campingplace
WHERE campingplace.place_id NOT IN (SELECT camping_place FROM reservation WHERE arrival_date >= '2022-01-24' AND departure_date <= '2022-01-27');");
        while ($row = $stmt->fetch()) {
            array_push($reserv, array(
                $row['place_id'],
                $row['reserved'],
                $row['price'],
                $row['reserved'],
                $row['reserved'],
            ));
        }
        return $reserv;
    }
    public function getDate()
    {
        // haal alle huisjes op.
        // haal alle resveringen binnen de datum op.
        // haal van de reseveringen de huisjes op.
        //
    }
}