<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles3.css">
</head>
<body>
    <div id="contenitore">
        <ul>
        <?php
            include ("connessione.php");
            session_start();
            if($_SESSION["userLog"] == true){
                echo "<h1>Benvenuto {$_SESSION["username"]}</h1>";
            }else{
                header('Location: errore_loginreg.php');
                $_SESSION["messaggioErrore"] = "Sessione scaduta!"; 
            }

            $us = $_SESSION["username"];

            $sql = "SELECT U.username, U.nome, U.cognome, U.email, U.dataregistrazione FROM utente U WHERE U.username = '$us'";
            $result = $conn -> query($sql);
            if($result-> num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<li>Username: {$row["username"]}</li>
                        <li>Nome: {$row["nome"]}</li>
                        <li>Cognome: {$row["cognome"]}</li>
                        <li>Email: {$row["email"]}</li>
                        <li>Data Registrazione: {$row["dataregistrazione"]}</li>";
                }
            }
        ?>
        </ul>
        <br>
        <a href="./paginalogin.html">Torna al login</a>
        <br>
        <a href="./scriptlogout.php">Effettua il logout</a>
    </div>
</body>
</html>