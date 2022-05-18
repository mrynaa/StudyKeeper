<?php 
    session_start();
    if(!isset($_COOKIE["LoggedUser"])) {
        header("Location: http://localhost:3000/login.php");
    } else {
        $_SESSION["userSession"] = $_COOKIE["LoggedUser"];
    }
?>

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
    <link rel="stylesheet" href="timer-statistic.css">
    <title>Statistiche</title>
    <link rel="shortcut icon" href="logo-sk.jpg" />

    <script>
        function showDetails(date) {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
            $.ajax({
                url: "details.php",
                method: "POST",
                data: {Date:date},
            }).done(function(response) {
                $("#main").html(response);
            });  
        }
    </script>

</head>
<body>

    <?php 
        $dbconn = pg_connect("host=localhost dbname=StudyKeeper password=superuser user=postgres port=5432")
            or die(pg_last_error());
        $query = 'SELECT date_trunc(\'second\', avg(r.tempo)) as d_media, 
                        date_trunc(\'second\', avg(sessione.tempo)) as s_media,
                    (avg(sessione.pause))::decimal(10,2) as sp_media 
                  from (SELECT sum(tempo) as tempo, data, username
                        from sessione
                        where username = $1
                        group by data, username 
                        order by data) as r, sessione';
        $result = pg_query_params($dbconn, $query, array($_SESSION["userSession"]));
        $tuple = pg_fetch_array($result, null, PGSQL_ASSOC);
        if($tuple["d_media"] == null) {
            $d_media = "00:00:00";
            $s_media = "00:00:00";
        } else {
            $d_media = $tuple["d_media"];
            $s_media = $tuple["s_media"];
        }
        $sp_media = (float) $tuple["sp_media"];
        $sp_media_c = (int) $sp_media;
        if($sp_media - $sp_media_c > 0.5)  { $sp_media_c += 1; };
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
                        <a class="nav-link linknav" href="main.php"> Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linknav" href="profilo.php"> Profilo </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linknav" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CENTRO DELLA PAGINA -->
    <div id="main" class="container-fluid background" style="align-content: center;">  
        <div class="summary"> 
            <h2  style="font-family: Times New Roman, Times, serif;"> Le tue statistiche </h2>
            <table class="table">
                <tbody>
                    <tr>
                        <td> Tempo medio di studio giornaliero </td>
                        <td> <?= $d_media ?> </td>
                    </tr>
                    <tr>
                        <td> Tempo medio di studio a sessione </td>
                        <td> <?= $s_media ?> </td>
                    </tr>
                    <tr>
                        <td> Numero medio di pause a sessione </td>
                        <td> <?= $sp_media_c ?> </td>
                    </tr>
                </tbody>
            </table> 
        </div>
        <?php 
            $query = 'SELECT sum(tempo) as tempo, sum(pause) as pause, 
                        floor(avg(valutazione)) as valutazione, data, username
                      from sessione
                      where username = $1
                      group by data, username 
                      order by data';
            $result = pg_query_params($dbconn, $query, array($_SESSION["userSession"]));
            while($tuple = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                if($tuple["valutazione"] == "1") {
                    $exp = "★";
                } if($tuple["valutazione"] == "2") {
                    $exp = "★★";
                }  if($tuple["valutazione"] == "3") {
                    $exp = "★★★";
                }  if($tuple["valutazione"] == "4") {
                    $exp = "★★★★";
                }  if($tuple["valutazione"] == "5") {
                    $exp = "★★★★★";
                }

                if ($tuple["tempo"][0] == "0") {
                    $hours = $tuple["tempo"][1];
                } else {
                    $hours = $tuple["tempo"][0].$tuple["tempo"][1];
                }

                if ($tuple["tempo"][3] == "0") {
                    $minutes = $tuple["tempo"][4];
                } else {
                    $minutes = $tuple["tempo"][3].$tuple["tempo"][4];
                }

                if ($tuple["tempo"][6] == "0") {
                    $seconds = $tuple["tempo"][7];
                } else {
                    $seconds = $tuple["tempo"][6].$tuple["tempo"][7];
                }

                echo "<section>";
                echo "<div class=\"summary\">";
                echo "<div class=\"div-sec labeldiv\">";
                echo "<p class=\"labeldate\">". $tuple["data"] . "</p>";
                echo "<p class=\"labelp\">". $hours."h ". $minutes ."m ". $seconds ."s "."</p>";
                echo "<p class=\"labelquality\"> esperienza: ". $exp . "</p>";
                echo "</div>";
                echo "<button class=\"btn btn-warning button-ss\" style=\"float: right;\" onclick=showDetails(\"".$tuple["data"]."\")> Vedi dettagli </button>";
                echo "</div>";
                echo "</section>";
            }
        ?> 
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
