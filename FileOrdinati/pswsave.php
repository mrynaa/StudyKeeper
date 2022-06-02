<?php
    session_start();
    $dbconn = pg_connect("host=localhost dbname=StudyKeeper password=superuser user=postgres port=5432")
                or die(pg_last_error());
    $query = "SELECT psw from utente where username = '".$_SESSION["userSession"]."'";
    $result = pg_query_params($dbconn, $query, array());
    $row = pg_fetch_array($result, null, PGSQL_ASSOC);
    if($row['psw'] != $_POST["opsw"]) {
        $_SESSION["opsw_error"] = "";
        header("Location: http://localhost:3000/cgpsw.php"); 
    } else {
        $query = "UPDATE utente 
                    set psw = '".$_POST["psw"]."' 
                  where username = '".$_SESSION["userSession"]."'";
        $result = pg_query_params($dbconn, $query, array());
        if($result) {
            $_SESSION["succ_cgpsw"] = "";
            header("Location: http://localhost:3000/cgpsw.php");
        }
    }
?>