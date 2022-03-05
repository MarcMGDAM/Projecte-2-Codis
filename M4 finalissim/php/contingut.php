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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="contingut2.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cabin:ital@1&family=Lobster&family=Patrick+Hand&display=swap%27');
    </style>
    <script src="javas.js"></script>
    <title>DAMA</title>
</head>
<body>
    <section>
        <header>
            <a href="#" class="logo">Dama</a>
            <!-- S'executa l'script d'abaix per a que quan se faci clic al menu s'obri i es pugui tancar-->
            <div class="Menu" onclick="Menu();"></div>
            <!-- Menu de navegacio de l'usuari -->
            <ul class="navegador">
                <li><a href="Perfil.php">Perfil</a></li>
                <li><a href="HistorialActivitats.php">Historial Act</a></li>
                <li><a href="../xml/curses.xml">Curses</a></li>
                <li><a href="HistorialCurses.php">Historial Curses</a></li>
                <li><a href="../index.html">Tancar Sessió</a></li>
            </ul>
        </header>
        <main>
            <div class="benvingut">
                <h2> Benvingut/da <?php echo $_SESSION['usuari'] ?></h2>
            </div>
            <div class="aforament">
                <h2>Aforament del gimnas</h2>

            </div>
            <h2>Cataleg d'activitats</h2>
            <div class="activitats">
                <div class="contenidor">
                <?php

                        $sql= "SELECT A.imatge, A.nomActivitat, A.hora, S.aforament, M.nom, A.numero_sala
                        from activitats A, sales S, monitors M
                        where A.numero_sala=S.num_sala and S.num_sala=M.sala_numero
                        order by imatge;";
                        $result = connexioBD()->query($sql);                        

                        if ($result->num_rows > 0){

                            while($row = $result->fetch_assoc()){
                                $imatge = $row["imatge"];
                                $nomActivitat = $row["nomActivitat"];
                                $hora = $row["hora"];
                                $aforament = $row["aforament"];
                                $nom = $row["nom"];
                                $num_sala = $row["numero_sala"];
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

                ?>
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