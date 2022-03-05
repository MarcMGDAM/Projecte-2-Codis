<?php
    session_start();
    $_SESSION["usuari"] = "";

    if(isset($_POST['submit'])) {

        $nombre = $_POST['usuari'];
        $password = $_POST['contrasenya'];

        $connexio = new mysqli ('localhost', 'root', 'mySQL', 'dama_gimnas');

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

<?php
    session_start();
 
    if(!empty($_POST)) {
 
        $connexio = new mysqli ('localhost', 'root', 'mySQL', 'dama_gimnas');
 
        if($connexio->connect_errno){
            die("Error al fer connexió");
        }else{

            $sql = "SELECT * FROM socis WHERE usuari = '" . $_SESSION['usuari'] . "'";
            $result = $connexio->query($sql);

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

            }

            if(empty($_POST['passwd'])) {

                $sql = "UPDATE socis SET mobil = '" . $_POST['telefon'] . "', email = '" . $_POST['email'] . 
                "', usuari ='" . $_POST['usuari'] . "', condicio_fisica ='" . $_POST['condicio_fisica'] .
                "', comunicacio_comercial = '" . $_POST['comunicacio_comercial'] .
                "', compte_bancari ='" . $_POST['compte_bancari'] . 
                "' WHERE DNI ='" . $_SESSION['DNI'] . "'";
                $result = $connexio->query($sql);

            } elseif (!empty($_POST['passwd'])){
                
                $sql = "UPDATE socis SET mobil = '" . $_POST['telefon'] . "', email = '" . $_POST['email'] . 
                "', usuari ='" . $_POST['usuari'] . "', contrasenya ='" . md5($_POST['passwd']) .
                "', condicio_fisica ='" . $_POST['condicio_fisica'] .
                "', comunicacio_comercial = '" . $_POST['comunicacio_comercial'] .
                "', compte_bancari ='" . $_POST['compte_bancari'] . 
                "' WHERE DNI ='" . $_SESSION['DNI'] . "'";
                $result = $connexio->query($sql);
            
            }else {
                $_SESSION['error'] = "Les dades estan mal introduides";
            }
        }
    }

?>

<!-- activitats -->
<?php
                    $connexio = new mysqli ('localhost', 'root', 'mySQL', 'dama_gimnas');

                    if($connexio->connect_errno){
                        die("Error al fer connexió");
                    }else{

                        $sql= "SELECT A.imatge, A.nomActivitat, A.hora, S.aforament, M.nom, A.num_sala
                        from activitats A, sales S, monitors M
                        where A.num_sala=S.num_sala and S.num_sala=M.num_sala
                        order by imatge;";
                        $result = $connexio->query($sql);

                        if ($result->num_rows > 0){

                            while($row = $result->fetch_assoc()){
                                $imatge = $row["imatge"];
                                $nomActivitat = $row["nomActivitat"];
                                $hora = $row["hora"];
                                $aforament = $row["aforament"];
                                $nom = $row["nom"];
                                $num_sala = $row["num_sala"];
                                echo " <div class='activitat'>
                                <div class='grid-container'>
                                    <div class='imatge'>
                                        <img src='$imatge'/>
                                    </div>
                                    <div class='nom_act'>
                                        <p>Nom de l'activitat: <b>$nomActivitat</b></p>
                                    </div>
                                    <div class='hora'>
                                        <p>Hora de l'activitat: <b>$hora</b></p>
                                    </div>
                                    <div class='aforament'>
                                        <p>Aforament de la sala: <b>$aforament</b></p>
                                    </div>
                                    <div class='nom_moni'>
                                        <p>Nom del monitor: <b>$nom</b></p>
                                    </div>
                                    <div class='sala'>
                                        <p>Sala: <b>$num_sala</b></p>
                                    </div>
                                    <div class='boto'>
                                    <input id='reserva' type='submit' value='Reserva'>
                                    <input id='anul·lar' type='submit' value='Anul·lar'>
                                    </div>
                                    
                                        </div>
                                </div>";
                            }
                        }

                    }

                ?>