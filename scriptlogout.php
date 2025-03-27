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
        session_unset();
    ?>
    <h1>Logout Effettuato</h1>
    <br>
    <a href="./paginalogin.html">Torna al login</a>
</body>
</html>