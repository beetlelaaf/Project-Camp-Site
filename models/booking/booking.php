<?php
require_once'core/db_connection.php';

class booking{
    public function book($postarray)
    {
        $dbconn = new db_connection();
        if(!empty($postarray)) {
            echo 'Hello inside the function before post initilize';

            $answer = $_POST[''];
            $cardId = $_GET['card'];
            $userId = 15;
        }
    }
}

$add_booking = new booking();
$books = $add_booking->book($_POST);