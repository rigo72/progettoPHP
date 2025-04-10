<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles3.css">
</head>
<body>
        <?php
            include ("connessione.php");
            session_start();
            if($_SESSION["userLog"] == true){
                echo "<h1 id='benvenuto'>Benvenuto {$_SESSION["username"]}</h1>";
            }else{
                header('Location: errore_loginreg.php');
                $_SESSION["messaggioErrore"] = "Sessione scaduta!"; 
        }
        ?>
    <div id="contenitore">
        <div id="datiUtente">
        <?php
            $us = $_SESSION["username"];
            $sql = "SELECT U.username, U.nome, U.cognome, U.email, U.dataregistrazione FROM utente U WHERE U.username = '$us'";
            $result = $conn -> query($sql);
            if($result-> num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "Username: {$row["username"]}<br>
                        Nome: {$row["nome"]}<br>
                        Cognome: {$row["cognome"]}<br>
                        Email: {$row["email"]}<br>
                        Data Registrazione: {$row["dataregistrazione"]}<br>";
                }
            }
        ?>
        </div>
        <br>
        <?php 
            $sql = "SELECT COUNT(*) AS num_recensioni FROM recensione R JOIN utente U ON U.ID_Utente = R.ID_Utente WHERE U.username = '$us'";
            $result = $conn -> query($sql);
            if($result->num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    echo "<p id='numeroRece'>Il numero di recensioni che hai fatto è {$row['num_recensioni']}</p> <br>";
                }
            }
        ?>
        
        <table>
            <?php
            /*
                $username = $_SESSION["username"];
                $sql = "SELECT RI.nome, RI.indirizzo, RI.citta, RE.voto, RE.data
                FROM ristorante RI
                JOIN recensione RE 
                ON RI.codiceristorante = RE.codiceristorante
                JOIN utente U 
                ON U.ID_Utente = RE.ID_Utente
                WHERE U.Username = '$username'";
                $result = $conn->query($sql);
                if($result -> num_rows > 0){
                    while($row = $)
                }
                */
            ?>
        </table>
        <br>
        <a href="./paginalogin.html">Torna al login</a>
        <br>
        <a href="./scriptlogout.php">Effettua il logout</a>

</body>
</html>