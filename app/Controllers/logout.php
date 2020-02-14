<?php
    session_start();
    if(isset($_SESSION["id"])){
        unset($_SESSION["id"]);
    }
    if(isset($_SESSION["tipo"])){
        unset($_SESSION["tipo"]);
    }
    header('Location: ../Views/index.php');
?>