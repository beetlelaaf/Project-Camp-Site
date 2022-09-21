<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="styling/vars.css">
    <link rel="stylesheet" href="styling/account.css">
    
</head>
<body>  
    <div class="content p-5">
        <div class="row g-0">
            <div class="col col-3"></div>
            <div class="col col-1 shadow navcolumn text-center">
                <div class="row g-0">
                    <div class="col p-3">
                        <i class="bi bi-gear-wide"> <b>Account</b></i>
                    </div>
                </div>
                <div class="row g-0">
                    <div onclick="toggleprofile()" class="col navbutton p-3">
                        <span>Profile</span>
                    </div>
                </div>
                <div class="row g-0">
                    <div onclick="toggleEditUsername()" class="col navbutton p-3">
                        <span>Edit Username</span>
                    </div>
                </div>
            </div>
            <div class="col col-5">
                <div id="accountContent1" class="shadow contentcolumn show">          
                    <?php if($success == 1) {?>
                        <div class="loading text-center">
                            <div class="spinner-grow text-primary" role="status">
                                <span class="sr-only"></span>
                            </div><br><br>
                            <span>Saving changes...</span>
                        </div>
                    <?php } else { ?>
                        <div class="mx-auto p-5">
                            <div class="text-center">
                                <span class="fs-2"><b>Account Details</b></span>
                            </div>                           
                            <div class="row pt-5">
                                <div class="col col-2"></div>
                                <div class="col col-4">
                                    <span class="fs-4"><b>Username</b></span><br>
                                    <span class="fs-4"><b>Email</b></span><br>
                                    <span class="fs-4"><b>Full Name</b></span><br>
                                    <span class="fs-4"><b>Adress</b></span><br>   
                                    <span class="fs-4"><b>Zipcode</b></span><br>
                                </div>
                                <div class="col col-6">
                                    <span class="fs-4"><?=$full_account[0]?></span><br>
                                    <span class="fs-4"><?=$full_account[1]?></span><br>
                                    <span class="fs-4"><?=$full_account[2]?></span>
                                    <span class="fs-4"><?=$full_account[3]?></span><br>   
                                    <span class="fs-4"><?=$full_account[4]?></span>
                                    <span class="fs-4"><?=$full_account[5]?></span><br>   
                                    <span class="fs-4"><?=$full_account[6]?></span> 
                                </div> 
                            </div>                                                        
                        </div>
                    <?php } ?>
                </div> 
                <div id="accountContent2" class="shadow contentcolumn">          
                    <div class="mx-auto text-center p-5">
                        <form method="post">
                            <input type="text" class="form-control mb-3" name="old_username" placeholder="Old Username" value="<?=$username?>">
                            <input type="text" class="form-control mb-3" name="new_username" placeholder="New Username">
                            <button type="submit" class="login btn btn-primary" name="update">Update</button>
                        </form>
                    </div>
                </div> 
            </div>
            <div class="col col-3"></div>      
        </div>
        <h5 class="text-center text-danger"><?=$error?></h5>
    </div>
</body>
</html>

<script>
    function toggleprofile() {
        var span = document.getElementById("accountContent1");
        span.classList.add("show");
        var span = document.getElementById("accountContent2");
        span.classList.remove("show");
    }

    function toggleEditUsername() {
        var span = document.getElementById("accountContent1");
        span.classList.remove("show");
        var span = document.getElementById("accountContent2");
        span.classList.add("show");
    }

</script>