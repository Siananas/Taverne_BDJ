<!DOCTYPE html>

<?php
include 'database.php'; 
global $bd;
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
                <li class = "appel">
                    <a href="#"><img src="tests/Image_test/icon_tel" width="100px" height="100px"/></a>
                </li>
                <li class="deroulant"><a href="#"><img src="tests/Image_test/Tibou.jpg" width="100px" height="100px"/> &ensp;</a>
                    <ul class="sous">
                        <li><a href="login_admin.php" target="_BLANK">Connection administrateur</a></li>
                        <li><a href="mentions_legales.php" target="_BLANK">Mentions légales</a></li>
                        <li><a href="contact_respo_site.php" target="_BLANK">Nous contacter</a></li>
                    </ul>
                </li>
            </ul>
        </nav> <!-- bannière -->

        <div class ="intro">
            <p class = "intro"> Bonjour cher Peufien ! </p>

            <p> Tu peux ici :</p>
            <p class ='alinea'>- Avoir accès à la liste des snacks que tu peux acheter</p>
            <p class ='alinea'>- Appeler un vendeur du snack</p>
            <p class ='alinea'>- Voir quels jeux sont disponibles à la location</p>

            <p> Voici les règles principales pour un bon fonctionnement général :</p>
            <p class ='alinea'>- Tu ne peux pas appeler un vendeur si quelqu'un en a appelé un il y a moins de 5 minutes</p>
            <p class ='alinea'>- Les jeux empruntés doivent être rendus après 2 semaines maximum</p>
            <p class ='alinea'>- Chaque </p>
            <p class ='alinea'>- Respecte les vendeurs et responsables du snack, ils sont là pour toi ;)<br><br><br>
            </p>

            <!-- 3 BOUTONS -->
            <nav class="menu-nav"> <!--création d'un menu navigation-->
                <ul> <!--//Stocker les differentes puces dans une balise-->
                    <li class="btn"> <!--//création d'un nouvelle puce-->
                        <a class = "snack" href="#snacks"> <!--//relie a un lien-->
                            Snacks
                        </a>
                    </li>
                    <li class="btn">
                        <a class = "matos" href="#matos" target="_BLANK"> 
                            Matériel
                        </a>
                    </li>
                    <li class="btn">
                        <a class = "jeux" href="#jeux" target="_BLANK"> 
                            Jeux
                        </a>
                    </li>
                </ul>
            </nav>
            <br><br>
        </div>
        
        <!-- 1ere section : snacks -->

        <div id="snacks">
            <h1 class = "snack">Snacks</h1>
            <p> Voici tous les snacks que nous vous proposons :
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
            Matériel
        </h1>
        <p>
            Voici tout le matériel que nous vous proposons :
        <ul class="item_matos">
            <?php
            for ($i = 0; $i < sizeof($matos); $i++) {
                echo "<li class='matos_list'><img src ='" . $matos[$i]['lien_img'] . "' width='80px' 'class='img'>" . ""
                . "<div class='matos_elements' >" . $matos[$i]["nom"];
            }
            ?>
        </ul> 
    </p>
</div>

<!-- 3eme section : location jeux de société -->
<div id="jeux">
    <h1 class = "jeux">
        Jeux
        </h3>
        <p>
            Voici tous les jeux que nous vous proposons :
        <ul class="item_jeux">
            <?php
            for ($i = 0; $i < sizeof($snacks); $i++) {
                echo "<li class='jeux_list'><img src ='" . $jeux[$i]['lien_img'] . "' width='80px' 'class='img'>" . ""
                . "<div class='matos_elements' >" . $snacks[$i]["nom"] . "";
            }
            ?>
        </ul> 
        </p>
</div>

<footer>
    <p>
        Copyright &copy; BDJ - 2022-2023 - All Right Reserved 
    </p>
</footer>

<?php
?>


</body>
</html>