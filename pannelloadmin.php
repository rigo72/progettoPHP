<?php
    include("connesione.php");
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