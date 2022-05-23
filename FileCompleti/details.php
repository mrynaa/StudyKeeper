<?php
     if(!isset($_POST["Date"])) {
        header("Location: http://localhost:3000/statistic.php"); 
    } else {
        session_start();
        $dbconn = pg_connect("host=localhost dbname=StudyKeeper password=superuser user=postgres port=5432")
            or die(pg_last_error());
        $query = 'SELECT tempo, pause, date_trunc(\'second\',ora) as ora, valutazione, commento
                from sessione, utente
                where utente.username=$1 and data=$2 and utente.idu = sessione.username 
                order by ora asc';
        $result = pg_query_params($dbconn, $query, array($_SESSION["userSession"],$_POST["Date"]));
    }
?>

<div class="summary">
    <h1 class="detTitle"> Sessioni del <?= $_POST["Date"]; ?> </h1> <br>

    <?php 
        $count = 1;
        while($tuple = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    ?>
        <h3> Sessione delle <?= $tuple["ora"] ?> </h3>
        <p style="white-space: normal; word-break: break-all;"> Sono state effettuate <?= $tuple["pause"] ?> pause, è stata valutata
            <?= $tuple["valutazione"] ?> stelle ed è durata <?= $tuple["tempo"] ?> </p>
    <?php
        if($tuple["commento"] != null) {
    ?>
        <h6> Il tuo commento </h6> 
        <div class="comment"> <?= $tuple["commento"] ?> </div>
        
    <?php   
        }  
        echo "<br> <br>";  
        }
    ?>
    <a href="" style="text-decoration: none; float: right;" class="linknav"> Indietro </a>
</div>