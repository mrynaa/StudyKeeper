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
        <link rel="stylesheet" href="main.css">
        <title>StudyKeeper</title>
    </head>
    

<body>
    <?php 
        if(!isset($_COOKIE["LoggedUser"])) {
            header("Location: http://localhost:3000/login.php");
        } else {
            $user = $_COOKIE["LoggedUser"];
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
                        <a class="nav-link linknav" href="main.php">Home</a>
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
    <div class="main text-center">
        <div class="row align-items-lg-center">
            <div class="col-lg-3 offset-xxl-1 col-xxl- mb-3 mb-lg-10 text-center text-lg-center">
                <div class="h2 font-weight-normal mb-0">
                    <p></p>
                    <h1 class="welcome">Ciao, <b> <?php echo $user ?></b>! <h1>
                    <h2 class= "welcome"> Cosa vuoi fare oggi?</h2>
                    <p></p> 
                    <button href="statistiche.php" class="btn btn-warning" style="width: 80%;">
                    Visualizza le tue statistiche
                    </button>
                    <p></p>
                    <button href="timer.html" class="btn btn-warning" style="width: 80%;">
                    Inizia una nuova sessione di studio
                    </button>
                </div>
            </div>
            <div class="col-lg-10 col-xxl-7 z-index-9 position-relative">
                <img src = "homeee.png" id= "logo" style = "max-width :60%" />
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