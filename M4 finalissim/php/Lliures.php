<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Activitats</title>
        <link rel="stylesheet" href="activitats.css"/>
    </head>
    <body>
    <section>
        <header>
            <a href="#" class="logo">Dama</a>
            <!-- S'executa l'script d'abaix per a que quan se faci clic al menu s'obri i es pugui tancar-->
            <div class="Menu" onclick="Menu();"></div>
            <!-- Menu de navegacio de l'usuari -->
            <ul class="navegador">
                <li><a href="Activitats.php">Activitats</a></li>
                <li><a href="Colectives.php">Activitats Col·lectives</a></li>
            </ul>
        </header>
        <ul class="sci">
            <li><a href="https://es-es.facebook.com/"><img src="IMG/facebook.png"></a></li>
            <li><a href="https://twitter.com/?lang=es"><img src="IMG/twitter.png"></a></li>
            <li><a href="https://www.instagram.com/?hl=es"><img src="IMG/instagram.png"></a></li>
        </ul>
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
    <div class="activitats">

        <?php
            $connexio = new mysqli ('localhost', 'root', '1234', 'dama_gimnas');

            if($connexio->connect_errno){
                die("Error al fer connexió");
            }else{

                $sql= "SELECT S1.nom, S1.descripcio, S1.hora from activitats S1 where S1.ID = (select *
				from activitat_lliure S2
				where S1.ID = S2.ID);";
                $result = $connexio->query($sql);

                if ($result->num_rows > 0){

                    while($row = $result->fetch_assoc()){

                            $nom = $row["nom"];
                            echo $nom . " ";

                            $descripcio = $row["descripcio"];
                            echo $descripcio . "<br>";
                    }
                }
                $connexio->close();

            }

        ?>
        </div>
    </body>
</html>