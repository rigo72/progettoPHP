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
        </tr>
        <?php
            $sql = "SELECT R.nome, R.indirizzo, R.citta, COUNT(*) AS numeroRecensioni
                    FROM recensione RC
                    JOIN ristorante R 
                    ON RC.codiceristorante = R.codiceristorante
                    GROUP BY R.nome, R.indirizzo, R.citta";
            $result = $conn -> query($sql);
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    echo"<tr><td>". $row["nome"] . "</td><td>" . $row["indirizzo"] . "</td><td>" . $row["citta"] . "</td><td>" . $row["numeroRecensioni"] . "</td></tr>";
                }
            }

        ?>
    </table>
</div>
<div>
    <form action="inserimentoristorante.php" method="POST">
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