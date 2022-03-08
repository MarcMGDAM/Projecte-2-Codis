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
                <div class="activitats">
                    <div class="contenidor">
                    <?php

                        $sql= "SELECT L.idreserva, L.ID, L.DNI, L.data_act, L.hora
                        from reserva_lliure L";
                        $result = connexioBD()->query($sql);                      

                        if ($result->num_rows > 0){

                            while($row = $result->fetch_assoc()){
                                $idreserva = $row["idreserva"];
                                $ID = $row["ID"];
                                $DNI = $row["DNI"];
                                $data = $row["data_act"];
                                $hora = $row["hora"];
                                echo " <div class='activitat'>
                                <div class='grid-container'>
                                <div class='id'>
                                        <p>ID reserva: <b>$idreserva</b></p>
                                    </div>
                                    <div class='id'>
                                        <p>ID: <b>$ID</b></p>
                                    </div>
                                    <div class='DNI'>
                                        <p>DNI: <b>$DNI</b></p>
                                    </div>
                                    <div class='data'>
                                        <p>Data: <b>$data</b></p>
                                    </div>
                                    <div class='hora'>
                                        <p>Hora: <b>$hora</b></p>
                                    </div>                                
                                        </div>
                                </div>";
                            }
                        }
                    ?>
                    </div>
                </div>

                <h3>Reserves Col·lectives</h3>
                <div class="activitats">
                    <div class="contenidor">
                    <?php

                        $sql= "SELECT c.idreserva, c.ID, c.DNI, c.data_act, c.hora
                        from reserva_colectiva c";
                        $result = connexioBD()->query($sql);                      

                        if ($result->num_rows > 0){

                            while($row = $result->fetch_assoc()){
                                $idreserva = $row["idreserva"];
                                $ID = $row["ID"];
                                $DNI = $row["DNI"];
                                $data = $row["data_act"];
                                $hora = $row["hora"];
                                echo " <div class='activitat'>
                                <div class='grid-container'>
                                <div class='id'>
                                        <p>ID reserva: <b>$idreserva</b></p>
                                    </div>
                                    <div class='id'>
                                        <p>ID: <b>$ID</b></p>
                                    </div>
                                    <div class='DNI'>
                                        <p>DNI: <b>$DNI</b></p>
                                    </div>
                                    <div class='data'>
                                        <p>Data: <b>$data</b></p>
                                    </div>
                                    <div class='hora'>
                                        <p>Hora: <b>$hora</b></p>
                                    </div>                                
                                        </div>
                                </div>";
                            }
                        }
                    ?>
                    </div>
                </div>

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