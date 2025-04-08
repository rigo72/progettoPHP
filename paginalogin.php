<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles1.css">
</head>
<body id="fondo">
    <div class="container">
        <form class="form" action="scriptlogin.php" method="POST">
          <p class="title">Login Form</p>
          <input placeholder="Username" class="username input" type="text" name="username" />
          <?php
              include("connessione.php");
              session_start();
              if(isset($_SESSION["errore"]) && $_SESSION["errore"] == "user"){
                echo "<p style='color:red;'>Username errato!!</p>";
                $_SESSION["errore"] = "a";
              }
          ?>
          <input placeholder="Password" class="password input" type="password" name="pass"/>
          <?php
              if(isset($_SESSION["errore"]) && $_SESSION["errore"] == "pass"){
                echo "<p style='color:red;'>Password errato!!</p>";
                $_SESSION["errore"] = "a";
              }
          ?>
          <button class="btn" type="submit">Login</button>
          <p id="fraseRegistrazione">Se non hai un account crealo <a href="paginaregistrazione.php" id="linkReg">qui</a></p>
        </form>
      </div>
</body>
</html>