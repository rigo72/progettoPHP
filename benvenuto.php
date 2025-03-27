<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        if($_SESSION["userLog"] == true){
            echo "<h1>Benvenuto {$_SESSION["username"]}</h1>";
        }else{
            header('Location: errore_loginreg.php');
            $_SESSION["messaggioErrore"] = "Sessione scaduta!"; 
        }
    ?>
    <br>
    <a href="./paginalogin.html">Torna al login</a>
    <br>
    <a href="./scriptlogout.php">Effettua il logout</a>
</body>
</html>