<?php
    include ("connessione.php");
    session_start();
    $ristorante = $_POST["ristorante"];
    $recensione = $_POST["recensione"];
    $id = $_SESSION["id"];
    $sql = "INSERT INTO recensione (voto, ID_Utente, codiceristorante) VALUES ('$recensione', '$id', '$ristorante')";
    if($conn -> query($sql)){
        $_SESSION["inserimento"] = true;
        header('Location: benvenuto.php');
    }else{
        $_SESSION["inserimento"] = false;
        header('Location: benvenuto.php');
    }
?>