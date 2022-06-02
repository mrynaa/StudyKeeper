<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
            rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
            crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
            crossorigin="anonymous">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/main.css">
        <title>Homepage</title>
        <link rel="shortcut icon" href="assets/logo-sk.jpg" />
    </head>
    

<body>
    <?php 
        session_start();
        if(!isset($_COOKIE["LoggedUser"])) {
            header("Location: http://localhost:3000/login.php");
        } else {
            $_SESSION["userSession"] = $_COOKIE["LoggedUser"];
        }

        if(isset($_SESSION["succ_reg"])) {
            echo "<script> alert(\"Registrazione effettuata con successo\"); </script>";
            unset($_SESSION["succ_reg"]);
        } 
    ?>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light nav-bg">
        <div class="container">
            <span> <a href="index.html" style="text-decoration: none;"> <l1 class="logoS">Study</l1><l2 class="logoK">Keeper</l2> </a> </span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link linknav" href="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linknav" href="profilo.php">Profilo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linknav" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CENTRO DELLA PAGINA -->
    <div class="pagina text-center">
        <div class="rowmain align-items-center"> 
            <div class="col-lg-5 col-sm-4 mb-4 text-center text-lg-center"> 
                <div class="welcome"> 
                    <p></p>
                    <h1>Ciao, <b> <?= $_SESSION["userSession"] ?></b>! <h1><h2> Cosa vuoi fare oggi?</h2>
                </div> 
                <p></p> 
                <div>
                    <a href="progressarea/statistic.php"><button class="btn btn-warning" style="width: 90%;">
                    Visualizza le tue statistiche 
                    </button></a>
                    <p></p>
                    <a href="studyarea/timer.php"><button class="btn btn-warning" style="width: 90%;">
                    Inizia una nuova sessione di studio
                    </button></a>
                </div> 
            </div>
            
           <div class="col-lg-7 col-sm-8">
                 <img src = "assets/home.png" id= "logo" style = "max-width :60%"/> 
            </div> 
        </div> 

    </div>

    <!-- FOOTER -->
    <footer class="text-center text-lg-start footer-bg text-muted">
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <div class="me-5 d-none d-lg-block">
                <span class="foo-log">Copyright © 2022, All Right Reserved Seobin</span>
            </div>
            <div>
                <a href="https://github.com/mrynaa/StudyKeeper" class="me-4 text-reset" style="text-decoration: none;">
                <i class="fa fa-github icon"></i>
                </a>
            </div>
        </section>           
    </footer>
</body>
</html>