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
    <div class="container_box">

        <br>
        <div>
            <input type="date" id="start" name="trip-start">
            <div style="display: contents">-</div>
            <input type="date" id="end" name="trip-start">
            <button class="btn btn-outline-Primary">submit</button>
        </div>
        <br>

        <div class="resv_resv">
            <div class="card" style="background-color: transparent">
                <?php foreach ($amountofreservation as $reserv){ ?>
                    <div class="img_card">
                        <img src="/img/tent.jpg" class="img_img">
                        <div class="img_text"><p class="right">Tent: <?php echo $reserv[0]?></p></div>
                        <div class="card_inhoud">
                            There are many variations of passages of Lorem Ipsum available,
                            but the majority have suffered alteration in some form, by injected humour,
                            or randomised words which don't look even slightly believable.
                            If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.
                            The generated Lorem Ipsum is therefore always free from repetition,
                            injected humour, or non-characteristic words etc.
                            <br>
                            <br>
                            <div style="margin-bottom: -33px;">
                                <a href="booking">Book</a>
                                <p style="display: block; text-align: end" class="right">Prijs: <?php echo $reserv[2]?></p>
                            </div>
                        </div>
                    </div>
                    <br>
                <?php } ?>
            </div>

        </div>

    </div>
</div>
</div>
</body>



</html>
