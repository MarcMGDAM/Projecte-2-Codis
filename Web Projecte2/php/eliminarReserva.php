<?php

    include 'phps.php';

    // echo "ID activitat".$_GET["id_activitat"]." · ID usuari".$_GET["id_client"];

    $data = date("Y-m-d"); 
    $hora = date("H:i:s");   

    $sql= "SELECT * from reserva_lliure";
    $result = connexioBD()->query($sql);

    if ($result->num_rows > 0) {

        // $sql = "SELECT * from reserva_lliure where '" . $_GET["id_client"] . "' in (select * from activitat_lliure)";
        // if ()
        $sql = "DELETE FROM reserva_lliure WHERE ID= '" . $_GET["id_activitat"] . "' and DNI ='" . $_GET["id_client"] . "'";
        $result = connexioBD()->query($sql);
        echo "Reserva Eliminada Correctament";

    }

    $sql= "SELECT * from reserva_colectiva";
    $result = connexioBD()->query($sql);

    if ($result->num_rows > 0) {

        $sql = "DELETE FROM reserva_colectiva WHERE ID= '" . $_GET["id_activitat"] . "' and DNI ='" . $_GET["id_client"] . "'";
        $result = connexioBD()->query($sql);
        echo "Reserva Eliminada Correctament";

    }
?>