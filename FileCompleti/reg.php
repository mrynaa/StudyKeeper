<?php
    session_start();
    $dbconn = pg_connect("host=localhost dbname=StudyKeeper password=superuser user=postgres port=5432")
                or die(pg_last_error());
    $user = $_POST["username"];
    $query = 'SELECT * from utente where username = $1';
    $result = pg_query_params($dbconn, $query, array($user));
    if(pg_fetch_array($result, null, PGSQL_ASSOC)) {
        $_SESSION["key_error"] = "";
        header("Location: http://localhost:3000/registrazione.php");
    } else {
        $email = $_POST["email"];
        $psw = $_POST["password"];
        $iscrizione = date('Y-m-d');
        $query = 'INSERT into utente values ($1,$2,$3,$4)';
        $result = pg_query_params($dbconn, $query, array($user, $email, $psw, $iscrizione));
        if($result) {
            $_SESSION["succ_reg"] = "";
            header("Location: http://localhost:3000/login.php");
        }
    }
    pg_close($dbconn);

?>