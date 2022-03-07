<?php

    include 'phps.php';
    session_start();
    perfil();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Perfil.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cabin:ital@1&family=Lobster&family=Patrick+Hand&display=swap%27');
    </style>
    <title>Perfil</title>
</head>
<body>
    <header>
        <!-- S'executa l'script d'abaix per a que quan se faci clic al menu s'obri i es pugui tancar-->
        <div class="Menu" onclick="Menu();"></div>
        
    </header>
        <div class="container">
            <div class="main">
                <div class="topbar">
                    <a href="contingut.php">Torna al cataleg</a>
                    <a href="reserves.php">Reserves</a>
                    <a href="#" class="logo">Dama</a>
                </div>
                <form method="POST">
                    <div>
                    <h1 class="dades_personals">Dades personals</h1>
                    <hr>
                        <div class="row">
                            <div class="nom">
                                <h5>Nom</h5>
                            </div>
                            <div class="usuari">
                                <input type="text" name="nom" id="NOM" readonly onmousedown="return false" value="<?php echo $_SESSION['nom']; ?>">
                            </div>
                                    
                            <div class="nif">
                                <h5>DNI</h5>
                            </div>
                            <div class="DNI">
                                <input type="text" name="dni" id="DNI" readonly onmousedown="return false" value="<?php echo $_SESSION['DNI']; ?>">
                            </div>
                                    
                            <div class="cognom">
                                <h5>Cognoms</h5>
                            </div>
                            <div class="cognoms">
                                <input type="text" name="cognom" id="cognom" readonly onmousedown="return false" value="<?php echo $_SESSION['cognom']; ?>">
                            </div>
                                    
                            <div class="sex">
                                <h5>Sexe</h5>
                            </div>
                            <div class="sexe">
                                <input type="text" name="sex" id="sex" readonly onmousedown="return false" value="<?php echo $_SESSION['sexe']; ?>">
                            </div>
                                    
                            <div class="data">
                                <h5>Data naixement</h5>
                            </div>
                            <div class="naixement">
                                <input type="text" name="naix" id="naix" readonly onmousedown="return false" value="<?php echo $_SESSION['data_naix']; ?>">
                            </div>
                            <br>
                            <br>        
                        </div>
                            
                    <h1 class="m-3">Dades d'usuari</h1>
                    <hr>
                        <div class="row2">
                            <div class="user">
                                <h5>Usuari</h5>
                            </div>
                            <div class="name-user">
                                <input type="text" name="usuari" id="usuari" value="<?php echo $_SESSION['usuari']; ?>">
                            </div>
                                    
                            <div class="contra">
                                <h5>Contrasenya</h5>
                            </div>
                            <div class="contrasenya">
                                <input type="password" name="passwd" id="contra">
                            </div>
                            <br>
                            <br>
                                    
                        </div>                             
                           
                    <h1 class="m-3">Dades de contacte</h1>
                    <hr>
                        <div class="row3">
                            <div class="mobil">
                                <h5>Telefon</h5>
                            </div>
                            <div class="telefon-numero">
                                <input type="text" name="telefon" id="telefon" value="<?php echo $_SESSION['mobil']; ?>">
                            </div>
                           
                            <div class="correu">
                                <h5>Correu electronic</h5>
                            </div>
                            <div class="email">
                                <input type="text" name="email" id="email" value="<?php echo $_SESSION['email']; ?>">
                            </div>
                            <br><br>
                        </div>

                    <h1 class="m-3">Altres dades</h1>
                    <hr>
                        <div class="row4">
                            <div class="condicio">
                                <h5>Condició Fisica</h5>
                            </div>
                            <div class="fisica">
                                <input type="text" name="condicio_fisica" id="condicio_fisica" value="<?php echo $_SESSION['condicio_fisica']; ?>">
                            </div>

                            <div class="comunicacio">
                                <h5>Comunicació comercial</h5>
                            </div>
                            <div class="comercial">
                                <input type="text" name="comunicacio_comercial" id="comunicacio_comercial" value="<?php echo $_SESSION['comunicacio_comercial']; ?>">
                            </div>

                            <div class="compte">
                                <h5>Compte bancari</h5>
                            </div>
                            <div class="bancari">
                                <input type="text" name="compte_bancari" id="compte_bancari" value="<?php echo $_SESSION['compte_bancari']; ?>">
                            </div>
                            <hr>
                        </div>
                    <input type="submit" name="submit" value="Guardar Dades">
                </form>         
            </div>
        </div>
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