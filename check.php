<?php
    if(!isset($_POST["username"])) {
        header("Location: http://localhost:3000/login.php");
    } else {
        session_start();
        $dbconn = pg_connect("host=localhost dbname=StudyKeeper password=superuser user=postgres port=5432")
                    or die(pg_last_error());
        $user = $_POST["username"];
        $query = 'SELECT * from utente where username = $1';
        $result = pg_query_params($dbconn, $query, array($user));
        $tuple = pg_fetch_array($result, null, PGSQL_ASSOC);
        if(!$tuple) {
            $_SESSION["user_error"] = "";
            header("Location: http://localhost:3000/login.php");
        } else {
            if($tuple["psw"] != $_POST["password"]) {
                $_SESSION["psw_error"] = "";
                header("Location: http://localhost:3000/login.php");
            } else {
                setcookie("LoggedUser", $user, time() + (86400*30));
                $_SESSION["userSession"] = $user;
                header("Location: http://localhost:3000/main.php");
            }
        }
        pg_close($dbconn);
    } 
?>