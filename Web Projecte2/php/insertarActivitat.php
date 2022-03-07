<?php

    include 'phps.php';

    // echo "ID activitat".$_GET["id_activitat"]." · ID usuari".$_GET["id_client"];

    $data = date("Y-m-d"); 
    $hora = date("H:i:s");   

    $sql= "SELECT * from activitats where '" . $_GET["id_activitat"] . "' in (select * from activitat_lliure)";
    $result = connexioBD()->query($sql);

    if ($result->num_rows > 0) {

        $sql= "SELECT * from reserva_lliure where DNI='" . $_GET["id_client"] . "'";
        $result = connexioBD()->query($sql);

        if ($result->num_rows > 0) {

            $error = 'Error';
        } else {

            $sql = "INSERT INTO reserva_lliure values (default,'" . $_GET["id_activitat"] . "','" . $_GET["id_client"] . "','" . $data . "','" . $hora . "')";
            $result = connexioBD()->query($sql);
            echo "Reserva Feta Correctament";
            
        }

    }

    $sql2= "SELECT * from activitats where '" . $_GET["id_activitat"] . "' in (select * from activitat_colectiva)";
    $result = connexioBD()->query($sql2);

    if ($result->num_rows > 0) {

        $sql= "SELECT * from reserva_colectiva where DNI='" . $_GET["id_client"] . "'";
        $result = connexioBD()->query($sql);
    
        if ($result->num_rows > 0) {
    
            $error = 'Error';
        } else {
    
            $sql = "INSERT INTO reserva_colectiva values (default,'" . $_GET["id_activitat"] . "','" . $_GET["id_client"] . "','" . $data . "','" . $hora . "')";
            $result = connexioBD()->query($sql);
            echo "Reserva Feta Correctament";
        }

    }

    // else {

    //     $sql = "INSERT INTO reserva_colectiva values ('" . $_GET["id_activitat"] . "','" . $_GET["id_client"] . "','" . $data . "','" . $hora . "')";
    //     $result = connexioBD()->query($sql);
    //     echo "Reserva Feta Correctament";

    // }
?>

