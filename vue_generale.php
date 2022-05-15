<?php
session_start(); // démarrage de la session pour sauvegarder les variable (doit etre la première ligne du code)
?>
<!DOCTYPE html>

<?php
include 'database.php';
global $bd;

$sql = $db->prepare("SELECT * FROM snacks");
$sql->execute();
$snacks = $sql->fetchAll(\PDO::FETCH_ASSOC);

$sql = $db->prepare("SELECT * FROM jeux");
$sql->execute();
$jeux = $sql->fetchAll(\PDO::FETCH_ASSOC);

$sql = $db->prepare("SELECT * FROM materiel");
$sql->execute();
$materiel = $sql->fetchAll(\PDO::FETCH_ASSOC);
?>

<form method="post"> <!-- BONTON TEST html (il doit etre dans un form) -->
    <input class = "" name="test2" type ="submit" value = "Test" >
</form>


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


        <hr color="#DEB100" width="80%"> 

        <!-- 1ere section : snacks -->

        <div id="snacks">
            <h1 class = "snack">Snacks</h1>
            <p> Voici tous les snacks que nous vous proposons :
            <ul class="snack_bloc">
                <?php
                for ($i = 0; $i < sizeof($snacks); $i++) {
                    if ($snacks[$i]["dispo"] != 0) {
                        echo "<ul class='snack_list'><img src ='" . $snacks[$i]['lien_img'] . "' width='15%' id='prout'>" . ""
                        . "<div id='prout' class='nom' >" . $snacks[$i]["nom"] . ""
                        . "</div>" . "<div class='prix' id='prout' ><b> " . $snacks[$i]["prix"] . "€</b>"
                        . "</div> <hr color='#DE9426' size='5px' width='95%'> </ul>";
                    }
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
            for ($i = 0; $i < sizeof($materiel); $i++) {
                if ($i % 2 == 1) {
                    echo "<ul class='matos_list' background-color='#DE9426'><img src='" . $matos[$i]['lien_img'] . "' width='15%' class='matos_img'>"
                    . "<div class='nom' >" . $matos[$i]["nom"] . ""
                    . "</div><div class='dispo' >" . $matos[$i]["dispo"] . ""
                    . "</div></ul>";
                } else {
                    echo "<ul class='matos_list' background-color='white'><img src='" . $matos[$i]['lien_img'] . "' width='15%' class='matos_img'>"
                    . "<div class='nom' >" . $matos[$i]["nom"] . ""
                    . "</div><div class='dispo' >" . $matos[$i]["dispo"] . ""
                    . "</div></ul>";
                }
            }
            ?>
        </ul> 
    </p>
</div>

<!-- 3eme section : tion jeux de société -->
<div id="jeux">
    <h1 class = "jeux">
        Jeux
        </h3>
        <p>
            Voici tous les jeux que nous vous proposons :
        <ul class="item_jeux">
            <?php
            for ($i = 0; $i < sizeof($jeux); $i++) {

                $nb = strval($i);
                $bouton = "btn$nb";

                echo "<ul class='jeux_list'>          
                <img src ='" . $jeux[$i]['id_image'] . "' width='15%' id='prout'>" . ""
                . "<div class='nom' id='prout'>" . $jeux[$i]["nom"] . "</div>"
                . "<div class='dispo' id='prout'>" . $jeux[$i]["nombre_reserves"] . "</div>"
                . "<div class='btnjeux' id='prout'><form method='post'> 
                <input  name=" . $bouton . " value='' type='submit' class='btnjeux'></form></div>";

                if (isset($_POST[$bouton])) {
                    echo "<div class='nom' id='prout'> Description de " . $jeux[$i]["nom"] . "</div>";
                }

                echo '</ul>';
            }
            ?>
        </ul>         
        </p>
</div>
if (!isset($_SESSION['nb'])) $_SESSION['nb'] = 0;

<img src="Images/plus2.png">


<footer>
    <p>
        Copyright &copy; BDJ - 2022-2023 - All Right Reserved 
    </p>
</footer>



</body>
</html>
