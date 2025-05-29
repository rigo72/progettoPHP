<?php
    include("connessione.php");
    session_start();

    $codice = $_POST["codice"];
    $ristorante = $_POST["ristorante"];
    $indirizzo = $_POST["indirizzo"];
    $citta = $_POST["citta"];

    $sql = "INSERT INTO ristorante (codiceristorante, nome, indirizzo, citta) VALUES ('$codice', '$ristorante', '$ristorante', '$citta')";
    if($conn -> query($sql)){
            $_SESSION["esitoRistorante"] = "Ristorante inserito con successo";
        }else{
            $_SESSION["esitoRistorante"] = "Impossiblie aggiungere ristorante";
        }
    header('Location: pannelloadmin.php');
?>