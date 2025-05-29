<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body onload="caricaMappa()">
</html>
<table>
    <tr>
        <td>Codice Ristorante</td>
        <td>Nome Ristorante</td>
        <td>Indirizzo Ristorante</td>
        <td>Citta Ristorante</td>
    </tr>
<?php
include ("connessione.php");
$info = $_POST["info"];
$sql = "SELECT R.codiceristorante, R.nome, R.indirizzo, R.citta
        FROM ristorante R
        WHERE R.nome = '$info'";
        $result = $conn -> query($sql);
        if($result -> num_rows > 0){
            while($row = $result -> fetch_assoc()){
                echo "<tr><td>". $row["codiceristorante"] ."</td> <td>". $row["nome"] ."</td> <td>". $row["indirizzo"] ."</td> <td>". $row["citta"] ."</td> </tr>";
                }
        }
?>


</table>

                <div id="map" style="height: 500px; width: 100%;"></div>
<script src="mappa.js"></script>