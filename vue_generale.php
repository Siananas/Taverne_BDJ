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
                    <a href="appel_vendeur.php"><img src="tests/Image_test/icon_tel" width="100px" height="100px"/></a>
                </li>
                <li class="deroulant"><a href="#"><img src="tests/Image_test/Tibou.png" width="100px" height="100px"/> &ensp;</a>
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
            <h1 class = "titre_part">Snacks</h1>
            <p> Voici tous les snacks que nous vous proposons :
            <div class="snack_bloc">
                <?php
                for ($i = 0; $i < sizeof($snacks); $i++) {
                    if ($snacks[$i]["dispo"] != 0) {
                        echo "<ul class='snack_list'><img src ='" . $snacks[$i]['lien_img'] . "' width='15%' id='prout'>" . ""
                        . "<div id='prout' class='nom' >" . $snacks[$i]["nom"] . ""
                        . "</div>" . "<div class='prix' id='prout' ><b> " . $snacks[$i]["prix"] . "€</b>"
                        . "</div> <hr color='#38281B' size='5px' width='95%'> </ul>";
                    }
                }
                ?>
            </div>
        </p>
    </div>

    <!-- 2eme section : matériel -->

    <div id="matos">
        <h1 class = "titre_part">
            Matériel
        </h1>
        <p>
            Voici tout le matériel que nous vous proposons :
        <ul class="item_matos">
            <?php
            for ($i = 0; $i < sizeof($materiel); $i++) {
                echo "<ul class='matos_list'><img src='" . $materiel[$i]['img'] . "'  width='50%' class='matos_img'>"
                . "<div class='nom' >" . $materiel[$i]["nom"] . ""
                . "</div><div class='dispo'>" . $materiel[$i]["nombre"] . " disponibles"
                . "</div></ul>";
            }
            ?>
        </ul> 
    </p>
</div>

<!-- 3eme section : tion jeux de société -->
<div id="jeux">
    <h1 class = "titre_part">
        Jeux
        </h3>
        <p>
            Voici tous les jeux que nous vous proposons :
        <div class="item_jeux">
            <?php
            for ($i = 0; $i < sizeof($jeux); $i++) {

                $nb = strval($i);
                $bouton = "btn$nb";
                    echo "<ul class='jeux_list'>
                <img src ='" . $jeux[$i]['id_image'] . "' width='15%' id='prout'>" . ""
                    . "<div class='nom' id='prout'>" . $jeux[$i]["nom"] . "</div>";
                if ($jeux[$i]['nombre'] - $jeux[$i]['nombre_reserves'] == 0) {
                echo "<div class='nondispo' id='prout'>Non dispo</div>";}
                else{echo "<div class='dispo' id='prout'>Dispo</div>";}
                
                echo "<i><div class='btnjeux'><form method='post'> 
                <input  name=" . $bouton . " value='En savoir plus' type='submit' class='btnjeux'></form></div></i>";
                
                if (isset($_POST[$bouton])) {
                    echo "<div class='description'><u>Description:</u> " . $jeux[$i]["description"] . "</div>";
                }

                echo '</ul>';
            }
            ?>
        </div>         
        </p>
</div>

<footer>
    Copyright &copy; BDJ - 2022-2023 - All Right Reserved 
</footer>



</body>
</html>
