<head>
    <link rel="stylesheet" href="/styling/login.css">
    <link rel="stylesheet" href="/styling/vars.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">    
</head>


<div class="content">
    <div class="row">
        <div class="col col-4"></div>
        <div class="col col-4">
            <div class="inputcard">
                <div class="cardtitle text-center">
                    <p class="title">Register</p>
                </div>           
                <div class="input mx-auto text-center p-5">
                    <form method="post">
                        <input type="text" class="form-control mb-3" placeholder="Username" name="username" required>
                        <input type="password" class="form-control mb-3" placeholder="Password" name="pass" required>
                        <input type="password" class="form-control mb-3" placeholder="Password-Repeat" name="pass-repeat" required>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Name" name="name" required>
                            <input type="text" class="form-control" placeholder="Lastname" name="lastname" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Street" name="street" required>
                            <input type="text" class="form-control" placeholder="Housenumber" name="housenumber" required>
                        </div>
                        <input type="text" class="form-control mb-3" placeholder="Zipcode" name="zipcode" required>
                        <input type="email" class="form-control mb-4" placeholder="Email" name="email" required>
                        <button type="submit" class="login btn btn-primary">Register</button>
                    </form>
                    <h5 class="text-center text-danger"><?=$error?></h5>
                    <h5 class="text-center text-succes"><?=$succes?></h5>
                </div>
                <div class="text-center">
                <p>
                    Al een account? <a href="/login">Click hier</a>
                </p>
            </div> 
            </div>  
        </div>
        <div class="col col-4"></div>      
    </div>
</div>
