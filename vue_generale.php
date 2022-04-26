<!DOCTYPE html>

<?php
include 'conn.php'; //On se connecte a la bdd, et on recupere les differentes variables
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>TaverneBDJ</title>
        <link rel="stylesheet" href="styles.css"/>
    </head>

    <body>

        <h1 class = "banniere">Taverne BDJ</h1>
        <nav class = "banniere">
            <ul>
                <li class="deroulant"><a href="#"><img src="tests/Image_test/Tibou.jpg"> &ensp;</a>
                    <ul class="sous">
                        <li><a href="anais.php" target="_BLANK">Connection administrateur</a></li>
                        <li><a href="https://fr.wikipedia.org/wiki/Raclette" target="_BLANK">Mentions légales</a></li>
                        <li><a href="https://fr.wikipedia.org/wiki/Saucisson" target="_BLANK">Nous contacter</a></li>
                    </ul>
                </li>
            </ul>
        </nav> <!-- bannière -->

        <p class = "intro"> Introduction </p>

        <p> insérer blabla pour l'introduction </p>

        <!-- 3 BOUTONS -->
        <nav class="menu-nav"> <!--création d'un menu navigation-->
            <ul> <!--//Stocker les differentes puces dans une balise-->
                <li class="btn"> <!--//création d'un nouvelle puce-->
                    <a class = "snack" href=vue_generale.php> <!--//relie a un lien-->
                        Snacks
                    </a>
                </li>
                <li class="btn">
                    <a class = "matos" href="https://fr.wikipedia.org/wiki/Raclette" target="_BLANK"> 
                        Matériel
                    </a>
                </li>
                <li class="btn">
                    <a class = "jeux" href="https://fr.wikipedia.org/wiki/Raclette" target="_BLANK"> 
                        Jeux
                    </a>
                </li>
            </ul>
        </nav>

        <!-- 1ere section : snacks -->
    </div>
    <div id="snacks">
        <h1 class = "snack">
            SNACKS
        </h1>
        <p>
            Voici tous les snacks que nous vous proposons :

        <ul class="item_snack">
            <?php
            for ($i = 0; $i < sizeof($snacks); $i++) {
                echo "<li class='snacks_list'><img src ='" . $snacks[$i]['lien_img'] . "' width='80px' 'class='img'>" . ""
                . "<div class='snacks_elements' >" . $snacks[$i]["nom"] . ""
                . "</div> prix </li>";
            }
            ?>
        </ul> 

    </p>
</div>

<!-- 2eme section : matériel -->
<div id="matos">
    <h1 class = "matos">
        MATERIEL
    </h1>
    <p>
        Voici tout le matériel que nous vous proposons :
    </p>
</div>

<!-- 3eme section : location jeux de société -->
<div id="jeux">
    <h1 class = "jeux">
        JEUX
        </h3>
        <p>
            Voici tous les jeux que nous vous proposons :
        </p>
</div>


<?php
?>
</body>
</html>