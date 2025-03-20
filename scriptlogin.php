<?php
    include("connessione.php"); 
?>

<?php
    session_start();
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];

    $sql = "SELECT U.username FROM utente U WHERE U.username = $_SESSION["username"]";
?>