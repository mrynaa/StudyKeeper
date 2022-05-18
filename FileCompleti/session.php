<?php 
    session_start();
    $dbconn = pg_connect("host=localhost dbname=StudyKeeper password=superuser user=postgres port=5432")
                or die(pg_last_error());
    $user = $_SESSION["userSession"];
    $time = $_POST["studyTime"];
    $pause = $_POST["pause"];
    $star = $_POST["valutation"];
    $com = $_POST["commento"];
    $query = 'INSERT into sessione values (DEFAULT,$1,$2,CURRENT_DATE,CURRENT_TIME,$3,$4,$5)';
    $result = pg_query_params($dbconn, $query, array($time, $pause, $star, $com, $user));
    if($result) {
        header("Location: http://localhost:3000/timer.php");
    }
    pg_close($dbconn);
?>