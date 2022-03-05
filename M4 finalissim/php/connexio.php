<?php
    $connexio = new mysqli ('localhost', 'root', '1234', 'dama_gimnas');
?>

<!-- 
if(!empty($_POST)) {

if(empty($_POST['passwd'])) {

    $sql = "UPDATE socis SET mòbil= '" . $_POST['mòbil'] . "' , e-mail='" . $_POST['e-mail'] . 
    "' , usuari='" . $_POST['usuari'] . "' , condició_fisica='" . $_POST['condició_fisica'] .
    "' , comunicació_comercial='" . $_POST['comunicació_comercial'] 
    . "' , compte_bancari='" . $_POST['compte_bancari'] . 
    "WHERE usuari='" . $_SESSION['usuari'] . "'";
    $result = $connexio->query($sql);

} else{

    $sql = "UPDATE socis SET mòbil= '" . $_POST['mòbil'] . "' ,e-mail= '" . $_POST['e-mail'] . 
    "' ,usuari= '" . $_POST['usuari'] . "' ,contrasenya= '" . md5($_POST['contrasenya']) 
    . "' ,condició_fisica= '" . $_POST['condició_fisica'] . "' ,comunicació_comercial= '" . $_POST['comunicació_comercial'] 
    . "' ,compte_bancari= '" . $_POST['compte_bancari'] . 
    "WHERE usuari = '" . $_SESSION['usuari'] . "'";
    $result = $connexio->query($sql);
} -->


<!-- elseif (!empty($_POST['passwd'])){
                
                $sql = "UPDATE socis SET mobil = '" . $_POST['telefon'] . "' ,email = '" . $_POST['email'] . 
                "' ,usuari= '" . $_POST['usuari'] . "' ,contrasenya= '" . md5($_POST['passwd']) 
                . "' ,condicio_fisica= '" . $_POST['condicio_fisica'] . "' ,comunicacio_comercial= '" . $_POST['comunicacio_comercial'] 
                . "' ,compte_bancari= '" . $_POST['compte_bancari'] . 
                "WHERE DNI = '" . $_SESSION['DNI'] . "'";
                $result = $connexio->query($sql); -->
