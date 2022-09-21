<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styling/vars.css">
    <link rel="stylesheet" href="styling/admin.css"> 
</head>
<body>
    <div class="content p-5">
        <div class="row g-0">
            <div class="col col-1"></div>
            <div class="col col-1 shadow navcolumn">
                <div class="row g-0">
                    <div class="col p-3 text-center">
                        <i class="bi bi-tools"></i> <b>Admin</b></i>
                    </div>
                </div>
                <div class="row g-0">
                    <div onclick="toggleDashboard()" class="col navbutton p-3">
                        <i class="bi bi-columns-gap"></i><span> Dashboard</span>
                    </div>
                </div>
                <div class="row g-0">
                    <div onclick="toggleUsers()" class="col navbutton p-3">
                        <i class="bi bi-people"></i><span> Users:</span>
                    </div>
                </div>
                <div class="row g-0">
                    <div onclick="toggleReservations()" class="col navbutton p-3">
                        <i class="bi bi-ticket-fill"></i><span> Reservations:</span>
                    </div>
                </div>
            </div>
            <div class="col col-9">
                <div id="accountContent1" class="shadow contentcolumn show">          
                    <div class="mx-auto text-center p-5">
                        <div class="row pt-3 pb-3 border-bottom">
                            <span class="fs-2">Dashboard</span>
                        </div> 
                        <div class="row">
                            <div class="col col-3">
                                <div class="mt-4">
                                    <span class="fs-5">Users</span>
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="progress mt-5">
                                    <div class="progress-bar bg-success w-100" role="progressbar"><?=count($users)?></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-3">
                                <div class="mt-4">
                                    <span class="fs-5">Reservations</span>
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="progress mt-5">
                                    <div class="progress-bar bg-success w-100" role="progressbar"><?=count($reservations)?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div id="accountContent2" class="shadow contentcolumn overflow-auto">          
                    <div class="mx-auto text-center p-5">
                        <div class="row pt-3 pb-3 border-bottom">
                            <span class="fs-2">Users</span>
                        </div> 
                        <div class="row pt-2 pb-2">
                            <div class="col-2"><b>Full Name</b></div>
                            <div class="col-2"><b>Street</b></div>
                            <div class="col-2"><b>Housenumber</b></div>
                            <div class="col-2"><b>Zipcode</b></div>
                            <div class="col-2"><b>Username</b></div>
                            <div class="col-2"><b>Email</b></div>
                        </div>
                        <?php foreach($users as $user) { ?>
                        <div class="row pt-2 pb-2">
                            <div class="col-2"><span class="data"><?php echo $user[0]?></span></div>
                            <div class="col-2"><span class="data"><?php echo $user[1]?></span></div>
                            <div class="col-2"><span class="data"><?php echo $user[2]?></span></div>
                            <div class="col-2"><span class="data"><?php echo $user[3]?></span></div>
                            <div class="col-2"><span class="data"><?php echo $user[4]?></span></div>
                            <div class="col-2"><span class="data"><?php echo $user[5]?></span></div>
                        </div>
                        <?php } ?>
                    </div>
                </div> 
                <div id="accountContent3" class="shadow contentcolumn  overflow-auto">          
                    <div class="mx-auto text-center p-5">
                        <div class="row pt-3 pb-3 border-bottom">
                            <span class="fs-2">Reservations</span>
                        </div>  
                        <div class="row pt-2 pb-2">
                            <div class="col-2"><b>Full Name</b></div>
                            <div class="col-2"><b>Place Number</b></div>
                            <div class="col-2"><b>Persons</b></div>
                            <div class="col-2"><b>Arrive Date</b></div>
                            <div class="col-2"><b>Depature Date</b></div>
                            <div class="col-2"><b>Prijs</b></div>
                        </div>
                        <?php foreach($reservations as $reservation) { ?>
                        <div class="row pt-1 pb-1">
                            <div class="col-2"><span class="data"><?php echo $reservation[0]?></span></div>
                            <div class="col-2"><span class="data"><?php echo $reservation[1]?></span></div>
                            <div class="col-2"><span class="data"><?php echo $reservation[2]?></span></div>
                            <div class="col-2"><span class="data"><?php echo $reservation[3]?></span></div>
                            <div class="col-2"><span class="data"><?php echo $reservation[4]?></span></div>
                            <div class="col-2"><span class="data"><?php echo $reservation[5]?></span></div>
                        </div>
                        
                        <?php }?>
                    </div>
                </div> 
            </div>
            <div class="col col-1"></div>      
        </div>
        <h5 class="text-center text-danger"><?=$error?></h5>
    </div>
</body>
</html>

<script>
    function toggleDashboard() {
        var span = document.getElementById("accountContent1");
        span.classList.add("show");
        var span = document.getElementById("accountContent2");
        span.classList.remove("show");
        var span = document.getElementById("accountContent3");
        span.classList.remove("show");
    }

    function toggleUsers() {
        var span = document.getElementById("accountContent1");
        span.classList.remove("show");
        var span = document.getElementById("accountContent2");
        span.classList.add("show");
        var span = document.getElementById("accountContent3");
        span.classList.remove("show");
    }

    function toggleReservations() {
        var span = document.getElementById("accountContent1");
        span.classList.remove("show");
        var span = document.getElementById("accountContent2");
        span.classList.remove("show");
        var span = document.getElementById("accountContent3");
        span.classList.add("show");
    }

</script>
