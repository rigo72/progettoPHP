<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles3.css">
</head>
<body>
    <div>
        <?php
            include ("connessione.php");
            session_start();

            if($_SESSION["userLog"] == true){
                echo "<h1 id='benvenuto'>Benvenuto {$_SESSION["username"]}</h1>";
                if($_SESSION["admin"] == 1){
                    header('Location: pannelloadmin.php');
                }
            }else{
                header('Location: errore_loginreg.php');
                $_SESSION["messaggioErrore"] = "Sessione scaduta!"; 
            }
            if(!isset($_SESSION["inserimento"])) {
                $_SESSION["inserimento"] = false;
            }
        ?>
    </div>
    <div id="contenitore">
        <div id="datiUtente">
            <?php
                $us = $_SESSION["username"];
                $sql = "SELECT U.ID_Utente, U.username, U.nome, U.cognome, U.email, U.dataregistrazione FROM utente U WHERE U.username = '$us'";
                $result = $conn -> query($sql);
                if($result-> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "Username: {$row["username"]}<br>
                            Nome: {$row["nome"]}<br>
                            Cognome: {$row["cognome"]}<br>
                            Email: {$row["email"]}<br>
                            Data Registrazione: {$row["dataregistrazione"]}<br>";
                            $_SESSION["id"] = $row["ID_Utente"];
                    }
                }
            ?>
        </div>
        <br>
        <div>
        <?php 
            $sql = "SELECT COUNT(*) AS num_recensioni FROM recensione R JOIN utente U ON U.ID_Utente = R.ID_Utente WHERE U.username = '$us'";
            $result = $conn -> query($sql);
            if($result->num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    echo "<p id='numeroRece'>Il numero di recensioni che hai fatto è {$row['num_recensioni']}</p> <br>";
                }
            }
        ?>
        </div>
        <div>
            <table id="tabella">
                <tr>
                    <td>Nome</td>
                    <td>Indirizzo</td>
                    <td>Citta</td>
                    <td>Voto</td>
                    <td>Data</td>
                </tr>
                <?php
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
                        while($row = $result -> fetch_assoc()){
                            echo "<tr><td>". $row["nome"] ."</td> <td>". $row["indirizzo"] ."</td> <td>". $row["citta"] ."</td> <td>". $row["voto"] ."</td> <td>". $row["data"] ."</td> </tr>";
                        }
                    }
                ?>
            </table>
        </div>
        <br>
        <div>
            <form action="inserimentoRecensione.php" method="post">
                <select name="ristorante" id="ristorante">
                    <?php
                        $sql = "SELECT RI.nome FROM ristorante RI";
                        $result = $conn -> query($sql);
                        if($result->num_rows > 0){
                            while($row = $result -> fetch_assoc()){
                                echo "<option value='{$row["nome"]}'>{$row["nome"]}</option>";
                            }
                        }
                    ?>
                </select>
                <br>
                <input type="radio" name="recensione" value="1" id="1"> 1
                <input type="radio" name="recensione" value="2" id="2"> 2
                <input type="radio" name="recensione" value="3" id="3"> 3
                <input type="radio" name="recensione" value="4" id="4"> 4
                <input type="radio" name="recensione" value="5" id="5"> 5
                <br>
                <input type="submit" value="Inserisci">
            </form>

            <?php
                if(isset($_SESSION["esito"])){
                    echo $_SESSION["esito"];
                    unset($_SESSION["esito"]);
                }
            ?>
</div>
<div>
    <p>Informazioni ristorante</p>
    <form action="informazioniristorante.php" method="post">
                <select name="info" id="ristorante">
                    <?php
                        $sql = "SELECT RI.nome FROM ristorante RI";
                        $result = $conn -> query($sql);
                        if($result->num_rows > 0){
                            while($row = $result -> fetch_assoc()){
                                echo "<option value='{$row["nome"]}'>{$row["nome"]}</option>";
                            }
                        }
                    ?>
                <input type="submit" value="Ottieni Informazioni">
    </form>
    <a href="./scriptlogout.php">Effettua il logout</a>
</div>
</body>
</html>

