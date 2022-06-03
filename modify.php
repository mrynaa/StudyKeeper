<?php
    session_start();
    if(isset($_POST["del_button"])) {
        $dbconn = pg_connect("host=localhost dbname=StudyKeeper password=superuser user=postgres port=5432")
                or die(pg_last_error());
        $query = "SELECT idu from utente where username = '".$_SESSION["userSession"]."'";
        $result = pg_query_params($dbconn, $query, array());
        $row = pg_fetch_array($result, null, PGSQL_ASSOC);
        $query = "DELETE from sessione where username = '".$row["idu"]."'";
        $query2 = "DELETE from utente where idu = '".$row["idu"]."'";
        $result = pg_query_params($dbconn, $query, array());
        if($result) {
            $result = pg_query_params($dbconn, $query2, array());
            if($result) {
                $_SESSION["canc_confirm"] = "";
                setcookie("LoggedUser", "CANC", time() - 3600);
                header("Location: http://localhost:3000/registrazione.php");
            }
        }  
    } else if(isset($_POST["save_button"]))  {
        $dbconn = pg_connect("host=localhost dbname=StudyKeeper password=superuser user=postgres port=5432")
                    or die(pg_last_error());

        if($_POST["new_username"]) {
            $query = "SELECT username from utente where username = '".$_POST["new_username"]."'";
            $result = pg_query_params($dbconn, $query, array());
            if(pg_fetch_array($result, null, PGSQL_ASSOC)) {
                $_SESSION["user_error"] = "";
                header("Location: http://localhost:3000/profilo.php");
            } else {
                $query = "UPDATE utente
                            set username = '".$_POST["new_username"]."'
                        where username = '".$_SESSION["userSession"]."'";
                $result = pg_query_params($dbconn, $query, array());
                setcookie("LoggedUser", "CANC", time() - 3600);
                setcookie("LoggedUser", $_POST["new_username"], time() + (86400*30));
                $_SESSION["userSession"] = $_POST["new_username"];
            }
        } 

        if($_POST["new_email"]) {
            $query = "SELECT email from utente where email = '".$_POST["new_email"]."'";
            $result = pg_query_params($dbconn, $query, array());
            if(pg_fetch_array($result, null, PGSQL_ASSOC)) {
                $_SESSION["email_error"] = "";
                header("Location: http://localhost:3000/profilo.php");
            } else {
                $query = "UPDATE utente 
                            set email = '".$_POST["new_email"]."'
                        where username = '".$_SESSION["userSession"]."'";
                $result = pg_query_params($dbconn, $query, array());
            }
        }

        if($_POST["new_old"]) {
            $query = "UPDATE utente 
                        set età = '".$_POST["new_old"]."'
                    where username = '".$_SESSION["userSession"]."'";
            $result = pg_query_params($dbconn, $query, array());
        }

        if($_POST["new_rank"]) {
            $query = "UPDATE utente 
                        set grado = '".$_POST["new_rank"]."'
                    where username = '".$_SESSION["userSession"]."'";
            $result = pg_query_params($dbconn, $query, array());
        }

        header("Location: http://localhost:3000/profilo.php");

    } else {
        header("Location: http://localhost:3000/profilo.php");
    }
?>
