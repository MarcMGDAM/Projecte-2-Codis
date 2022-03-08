<?php

    include 'phps.php';
    session_start();
    iniciasessio();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="inicisessio.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cabin:ital@1&family=Lobster&family=Patrick+Hand&display=swap%27');
    </style>
    <title>DAMA</title>
</head>
<body>
    <header>
    <a href="#" class="logo">Dama</a>
    </header>
    <main>
    <div class="ini">
    <h2> Inicia't sessió per poder participar en les nostres activitats </h2>
        <form action="IniciSessio.php" method="post">
            <p id="nom"><label for="nom">Nom Usuari:</label>
            <input type="text" name="usuari" id="usuari" placeholder ="nom d'usuari"></p>
            <p id="contra"><label for="nom">Contrasenya:</label>
            <input type="password" name="contrasenya" id="passw" placeholder="contrasenya"></p>
            <input id="login" type="submit" name="submit" value="Iniciar Sessió">
        </form>
    </div>
     <ul class="sci">
            <li><a href="https://es-es.facebook.com/"><img src="IMG/facebook.png"></a></li>
            <li><a href="https://twitter.com/?lang=es"><img src="IMG/twitter.png"></a></li>
            <li><a href="https://www.instagram.com/?hl=es"><img src="IMG/instagram.png"></a></li>
     </ul>
    </main>
</body>
</html>