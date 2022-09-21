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
                    <p class="title">Login</p>
                </div>           
                <div class="input mx-auto text-center p-5">
                    <form method="post">
                        <input type="text" class="form-control mb-3" name="email" placeholder="Email">
                        <input type="password" class="form-control mb-3" name="password" placeholder="Password">
                        <button type="submit" class="login btn btn-primary" name="login">Login</button>
                    </form>
                    <h5 class="text-center text-danger"><?=$error?></h5>
                    <h5 class="text-center text-success"><?=$succes?></h5>
                </div>
                <div class="text-center">
                <p>
                    Nog geen account? <a href="/register">Click hier</a><br>
                    Wachtwoord vergeten? <a class="text-danger" href="#">Scrapped!</a>
                </p>
            </div> 
            </div>  
        </div>
        <div class="col col-4"></div>      
    </div>
</div>
