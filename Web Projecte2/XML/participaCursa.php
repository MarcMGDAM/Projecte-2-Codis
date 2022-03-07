<?php

    include 'phps.php';

    // echo "ID activitat".$_GET["id_activitat"]." · ID usuari".$_GET["id_client"];

    $data = date("Y-m-d"); 
    $hora = date("H:i:s");   

    $sql= "SELECT * from curses";
    $result = connexioBD()->query($sql);

    if ($result->num_rows > 0) {

        $sql = "INSERT INTO participar values (default,'" . $_SESSION['DNI']. "','" . $_GET["id_cursa"] . "','" . $data . "')";
        $result = connexioBD()->query($sql);
        echo "Reserva Feta Correctament";

    } else{
        echo 'error';
    }
?>