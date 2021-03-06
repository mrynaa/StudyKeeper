<?php
    if(!isset($_POST["username"])) {
        print_r($_POST);
        header("Location: http://localhost:3000/registrazione.php"); 
    } else {
        session_start();
        $dbconn = pg_connect("host=localhost dbname=StudyKeeper password=superuser user=postgres port=5432")
                    or die(pg_last_error());
        $user = $_POST["username"];
        $email = $_POST["email"];
        $query = 'SELECT * from utente where username = $1';
        $result = pg_query_params($dbconn, $query, array($user));
        if(pg_fetch_array($result, null, PGSQL_ASSOC)) {
            $_SESSION["key_error"] = "";
            header("Location: http://localhost:3000/registrazione.php");
        } else {
            $query = 'SELECT * from utente where email = $1';
            $result = pg_query_params($dbconn, $query, array($email));
            if(pg_fetch_array($result, null, PGSQL_ASSOC)) {
                $_SESSION["email_error"] = "";
                header("Location: http://localhost:3000/registrazione.php");
            } else {
                $psw = $_POST["password"];
                $query = 'INSERT into utente values ($1,$2,$3,CURRENT_DATE,null,null,DEFAULT)';
                $result = pg_query_params($dbconn, $query, array($user, $email, $psw));
                if($result) {
                    $_SESSION["succ_reg"] = "";
                    setcookie("LoggedUser", $user, time() + (86400*30));
                    $_SESSION["userSession"] = $user;
                    header("Location: http://localhost:3000/main.php");
                }
            }
        }
        pg_close($dbconn);
    } 
?>
