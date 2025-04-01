<?php
    include("connessione.php");
    session_start();
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $passCriptata = hash("sha256", $pass);
    
    $sql = "INSERT INTO utente (username, password, nome, cognome, email) VALUES('$username','$firstname','$lastname','$email', '$passCriptata')";
    $result = $conn ->  query($sql);
    var_dump($result);
?>