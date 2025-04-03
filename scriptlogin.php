<?php
    include("connessione.php"); 
?>

<?php
    session_start();
    $username = $_POST["username"];
    $pass = $_POST["pass"];

    $sql = "SELECT U.username, U.pass FROM utente U WHERE U.username = '$username'";
    $result = $conn->query($sql);
    if($result -> num_rows > 0){
        $row = $result -> fetch_assoc();
        $usernameDB = $row["username"];
        if($usernameDB == $username){
            $passDB = $row["pass"];
            if($passDB == $pass){
                $_SESSION["userLog"] = true;
                $_SESSION["username"] = $username; 
                header('Location: benvenuto.php');
            }else{
                header('Location: errore_loginreg.php');
                $_SESSION["messaggioErrore"] = "Password sbagliata!!";
            }
        }else{
            header('Location: errore_loginreg.php');
            $_SESSION["messaggioErrore"] = "Username sbagliata!!";
        }
    }
?>