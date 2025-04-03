<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
    <?php
        session_start();
        if($_SESSION["userLog"] == true){
            echo "<h1>Benvenuto {$_SESSION["username"]}</h1>";
            break;
        }else{
            header('Location: errore_loginreg.php');
            $_SESSION["messaggioErrore"] = "Sessione scaduta!"; 
        }

        $sql = "SELECT U.username, U.nome, U.cognome, U.email, U.dataregistrazione FROM utente U WHERE '$_SESSION["passCriptata"]'";
        $result = $conn -> query($sql);
        if($result-> $num_rows > 0){
            while($row = $result->fetch_assoc()){
                
            }
        }
    ?>
    </ul>
    <br>
    <a href="./paginalogin.html">Torna al login</a>
    <br>
    <a href="./scriptlogout.php">Effettua il logout</a>
</body>
</html>