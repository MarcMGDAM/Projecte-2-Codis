<?php

    function connexioBD() {

        $connexio = new mysqli ('localhost', 'root', 'mysql', 'dama_gimnas');
        if($connexio->connect_errno){
            die("Error al fer connexió");
        }else{
            return $connexio;
        }
    }


    function iniciasessio() {

        if(isset($_POST['submit'])) {
            $nombre = $_POST['usuari'];
            $password = $_POST['contrasenya'];

            $sql = "SELECT * FROM socis WHERE usuari = '" . $nombre . "' AND contrasenya = '" . md5($password) . "'";
            $result = connexioBD()->query($sql);

            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()){

                    $_SESSION['DNI'] = $row['DNI'];
                    $_SESSION['nom'] = $row['nom'];
                    $_SESSION['cognom'] = $row['cognom'];
                    $_SESSION['sexe'] = $row['sexe'];
                    $_SESSION['data_naix'] = $row['data_naix'];
                    $_SESSION['mobil'] = $row['mobil'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['usuari'] = $row['usuari'];
                    $_SESSION['contrasenya'] = $row['contrasenya'];
                    $_SESSION['condicio_fisica'] = $row['condicio_fisica'];
                    $_SESSION['comunicacio_comercial'] = $row['comunicacio_comercial'];
                    $_SESSION['compte_bancari'] = $row['compte_bancari'];

                }

                header("Location:contingut.php");
            } else{
                header("Location:IniciSessio.php");
            }
        }
    }

    function perfil() {

        if(!empty($_POST)) {

            if(empty($_POST['passwd'])) {

                $sql = "UPDATE socis SET mobil = '" . $_POST['telefon'] . "', email = '" . $_POST['email'] . 
                "', usuari ='" . $_POST['usuari'] . "', condicio_fisica ='" . $_POST['condicio_fisica'] .
                "', comunicacio_comercial = '" . $_POST['comunicacio_comercial'] .
                "', compte_bancari ='" . $_POST['compte_bancari'] . 
                "' WHERE DNI ='" . $_SESSION['DNI'] . "'";
                $result = connexioBD()->query($sql);

            } elseif (!empty($_POST['passwd'])){
                
                $sql = "UPDATE socis SET mobil = '" . $_POST['telefon'] . "', email = '" . $_POST['email'] . 
                "', usuari ='" . $_POST['usuari'] . "', contrasenya ='" . md5($_POST['passwd']) .
                "', condicio_fisica ='" . $_POST['condicio_fisica'] .
                "', comunicacio_comercial = '" . $_POST['comunicacio_comercial'] .
                "', compte_bancari ='" . $_POST['compte_bancari'] . 
                "' WHERE DNI ='" . $_SESSION['DNI'] . "'";
                $result = connexioBD()->query($sql);
            
            }else {
                $_SESSION['error'] = "Les dades estan mal introduides";
            }
        }
    }

?>

