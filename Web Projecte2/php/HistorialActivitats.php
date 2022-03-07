<?php

    include 'phps.php';
    session_start();
    connexioBD();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="historialactivitats.css">
    <title>Document</title>
</head>
<body>
<section>
        <header>
            <a href="#" class="logo">Dama</a>
            <!-- S'executa l'script d'abaix per a que quan se faci clic al menu s'obri i es pugui tancar-->
            <div class="Menu" onclick="Menu();"></div>
            <!-- Menu de navegacio de l'usuari -->
            <ul class="navegador">
                <li><a href="contingut.php">Torna al catàleg</a></li>
            </ul>
        </header>
        <main>
            <div class="Historial">
                <h3>Historial d'Activitats</h3>
            </div>
            <div class="reserves">
                <h3>Reserves Lliures</h3>
                <?php

                    $sql= "SELECT A.imatge, R.idreserva, R.ID, R.DNI, R.data_act, R.hora 
                    from reserva_lliure R, activitat_lliure A
                    where R.ID = A.IDL and R.DNI='" . $_SESSION['DNI'] . "'";
                    $result = connexioBD()->query($sql);                      

                    if ($result->num_rows > 0){

                        while($row = $result->fetch_assoc()){
                            $imatge = $row["imatge"];
                            $IDreserva = $row["idreserva"];
                            $ID = $row["ID"];
                            $DNI = $row["DNI"];
                            $data = $row["data_act"];
                            $hora = $row["hora"];
                            echo " <div class='activitat'>
                            <div class='grid-container'>
                                <div class='imatge'>
                                    <img src='$imatge'/>
                                </div>
                                <div class='nom_act'>
                                    <p>Nom de l'activitat: <b>$IDreserva</b></p>
                                </div>
                                <div class='hora'>
                                    <p>Hora de l'activitat: <b>$ID</b></p>
                                </div>
                                <div class='aforament'>
                                    <p>Aforament de la sala: <b>$DNI</b></p>
                                </div>
                                <div class='nom_moni'>
                                    <p>Nom del monitor: <b>$data</b></p>
                                </div>
                                <div class='sala'>
                                    <p>Sala: <b>$hora</b></p>
                                </div>                                
                                    </div>
                            </div>";
                        }
                    }
                ?>

                <h3>Reserves Col·lectives</h3>

            </div>
        </main>
         <!-- Titol del gimnas i descripció -->
         <footer>
        <ul class="sci">
            <li><a href="https://es-es.facebook.com/"><img src="IMG/facebook.png"></a></li>
            <li><a href="https://twitter.com/?lang=es"><img src="IMG/twitter.png"></a></li>
            <li><a href="https://www.instagram.com/?hl=es"><img src="IMG/instagram.png"></a></li>
        </ul>
        </footer>  
    </section>
    <!-- Script per quan se estigui en mobil, se pugui obri i tancar el menu desplegable -->
    <script type="text/javascript">
        function Menu(){
            const Menu = document.querySelector('.Menu');
            const navegador = document.querySelector('.navegador');
            Menu.classList.toggle('active');
            navegador.classList.toggle('active');
        }
    </script>
    
</body>
</html>