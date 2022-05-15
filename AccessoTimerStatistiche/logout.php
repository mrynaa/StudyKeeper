<?php 
    session_start();
    setcookie("LoggedUser", $user, time() - 3600);
    unset($_SESSION["userSession"]);
    header("Location: http://localhost:3000/index.html");
?>
