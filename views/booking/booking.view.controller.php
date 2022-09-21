<?php

?><!DOCTYPE html>
<html lang="en" title="Camp-Site - Home -">
<link href="/styling/reserve.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

<body style="background-color: #cbe6cb">
<div class="container">
    <div style="text-align: center">
        <form action="/models/booking/booking.php">
            <input type="date" id="arrival" name="trip-start" placeholder="Aankomst datum">
            <input type="date" id="date" name="trip-end" placeholder="Vertrek Datum">
            <br>
            <br>
            <input type="text" name="person" placeholder="Aantal personen" />
            <br>
            <br>
            <input type="text" name="campingplace" placeholder="Camping plekje" />
            <br><br>
            <input type="submit" value="submit">
        </form>
    </div>
</div>
</body>



</html>
