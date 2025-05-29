<?php
    include ("connessione.php");
    session_start();

    if($_SESSION["userLog"] == false){
        header('Location: paginalogin.php');
        exit;
    }

    if($_SESSION["admin"] == 0){
        header('Location: paginalogin.php');
        exit;
    }
?>
<div>
    <table>
        <tr>
            <td>Nome</td>
            <td>Indirizzo</td>
            <td>Citta</td>
            <td>Numero Recensioni</td>
            <td>Codice Ristorante</td>
        </tr>
        <?php
            $sql = "SELECT R.codiceristorante, R.nome, R.indirizzo, R.citta, COUNT(RC.idrecensione) AS numeroRecensioni
                    FROM ristorante R
                    LEFT JOIN recensione RC
                    ON RC.codiceristorante = R.codiceristorante
                    GROUP BY R.codiceristorante";
            $result = $conn -> query($sql);
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    echo"<tr><td>" . $row["nome"] . "</td><td>" . $row["indirizzo"] . "</td><td>" . $row["citta"] . "</td><td>" . $row["numeroRecensioni"] . "</td><td>" . $row["codiceristorante"] . "</td></tr>";
                }
            }

        ?>
    </table>
</div>
<div>
    <form action="inserimentoristorante.php" method="POST">
            Inserisci il codice del ristorante <br>
            <input type="text" name="codice"> <br>
            Inserisci il nome del ristorante <br>
            <input type="text" name="ristorante"> <br>
            Inserisci l'indirizzo <br>
            <input type="text" name="indirizzo"> <br>
            Inserisci la citta <br>
            <input type="text" name="citta"> <br>
            <input type="submit">
    </form>
</div>
<div>
    <?php
        if(isset($_SESSION["esitoRistorante"])){
            echo $_SESSION["esitoRistorante"];
        }
    ?>
</div>
<a href="./scriptlogout.php">Effettua il logout</a>