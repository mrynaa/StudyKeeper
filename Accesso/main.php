<?php 
    if(!isset($_COOKIE["LoggedUser"])) {
        header("Location: http://localhost:3000/login.php");
    } else {
        echo "Welcome" . $_COOKIE["LoggedUser"];
    }
?>
