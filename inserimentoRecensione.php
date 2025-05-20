<?php
    include("connessione.php");
    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ristorante = $_POST["ristorante"];
        $recensione = $_POST["recensione"];
        $id = $_SESSION["id"];
        
        $sql = "SELECT codiceristorante FROM ristorante WHERE nome = '$ristorante'";
        $result = $conn->query($sql);
        $codiceRistorante = null;
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $codiceRistorante = $row['codiceristorante'];
        }
        
        if ($codiceRistorante) {
            $sql = "SELECT * FROM recensione WHERE ID_Utente = '$id' AND codiceristorante = '$codiceRistorante'";
            $result = $conn->query($sql);
            if ($result->num_rows == 0) {
                $sql = "INSERT INTO recensione (voto, ID_Utente, codiceristorante) VALUES ('$recensione', '$id', '$codiceRistorante')";
                if ($conn->query($sql)) {
                    $_SESSION["esito"] = "Recensione inserita con successo";
                } else {
                    $_SESSION["esito"] = "Impossibile aggiungere la recensione";
                }
            } else {
                $_SESSION["esito"] = "Hai già aggiunto una recensione per questo ristorante.";
            }
        } else {
            $_SESSION["esito"] = "Il ristorante selezionato non esiste.";
        }
        header('Location: benvenuto.php');
    }
?>

