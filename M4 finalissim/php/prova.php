<?php
    session_start();
    $_SESSION["usuari"] = "";

    if(isset($_POST['submit'])) {

        $nombre = $_POST['usuari'];
        $password = $_POST['contrasenya'];

        $connexio = new mysqli ('localhost', 'root', '1234', 'dama_gimnas');

        $sql = "SELECT * FROM socis WHERE usuari = '" . $nombre . "' AND contrasenya = '" . md5($password) . "'";
        $result = $connexio->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['usuari'] = $nombre;
            header("Location:contingut.php");
        } else {
            header("Location:IniciSessio.php");
        }
    }

?>