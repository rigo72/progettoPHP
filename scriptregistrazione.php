<?php
    include("connessione.php");
    session_start();
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $passCriptata = hash("sha256", $pass);
    
    $sql = "SELECT U.username, U.email FROM utente U";
    $result = $conn -> query($sql);
    if($result -> num_rows > 0){
        while($row = $result->fetch_assoc()){
            if($row["username"] == $username){
                header('Location: errore_loginreg.php');
                $_SESSION["messaggioErrore"] = "Username gia esistente!!";
            }elseif($row["email"] == $email){
                header('Location: errore_loginreg.php');
                $_SESSION["messaggioErrore"] = "Email gia esistente!!";
            }
        }
    }

    $sql = "INSERT INTO utente (username, pass, nome, cognome, email) VALUES('$username','$passCriptata','$firstname','$lastname', '$email')";
    if($conn -> query($sql)){
        $_SESSION["userLog"] = true;
        $_SESSION["username"] = $username;
        $_SESSION["passCriptata"] = $passCriptata;
        header('Location: benvenuto.php');
    }else{
        header('Location: errore_loginreg.php');
        $_SESSION["messaggioErrore"] = "Registrazione fallita!!";
    }


?>