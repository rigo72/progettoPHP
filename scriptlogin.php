<?php
    include("connessione.php"); 
?>

<?php
    session_start();
    $username = $_POST["username"];
    $pass = $_POST["pass"];

    $sql = "SELECT U.username, U.pass, U.admin FROM utente U WHERE U.username = '$username'";
    $result = $conn->query($sql);
    var_dump($result);  
    if($result -> num_rows > 0){
        $row = $result -> fetch_assoc();
        $usernameDB = $row["username"];
        $passDB = $row["pass"];
        $admin = $row["admin"];
        $passCriptata = hash("sha256", $pass);
            if($passDB == $passCriptata){
                $_SESSION["userLog"] = true;
                $_SESSION["username"] = $username;
                $_SESSION["admin"] = $admin;
                header('Location: benvenuto.php');
            }else{
                $_SESSION["errore"] = "pass";
                header('Location: paginalogin.php');
            }
    }else{
        $_SESSION["errore"] = "user";
        header('Location: paginalogin.php');
    }
?>