<?php
session_start(); // démarrage de la session pour sauvegarder les variable (doit etre la première ligne du code)
?>

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


<!DOCTYPE html>
<<html>
    <head>
        <meta charset="UTF-8">
        <title>title</title>
        <link rel="stylesheet" href="style_anais3.css"/>

    </head>
    <body>
        <h1>TavernBDJ</h1>
        <nav class="menu-nav"> <!--création d'un menu navigation-->
            <ul> <!--//Stocker les differentes puces dans une balise-->
                <li class="btn"> <!--//création d'un nouvelle puce-->
                    <a href=../vue_generale.php> <!--//relie a un lien-->
                        Matos
                    </a>
                </li>
                <li class="btn">
                    <a href="https://fr.wikipedia.org/wiki/Raclette" target="_BLANK"> 
                        Snack
                    </a>
                </li>
                <li class="btn">
                    <a href="https://fr.wikipedia.org/wiki/Raclette" target="_BLANK"> 
                        Jeux
                    </a>
                </li>
            </ul>
        </nav>

        <div id="accueil">

        </div>
        <div id="snacks">
            <h1>
                SNACKS
            </h1>
            <p>
                Voici tous les snacks que nous vous proposons

            <ul class="snacks_objet">
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
    c'est ici
    <form method="post"> <!-- BONTON TEST html (il doit etre dans un form) -->

        <input type="image" src="../Images/plus" alt="Submit" width="100" formtarget="test">
    </form>



    <?php
    if (isset($_POST['test'])) { // Si Lecture du bouton ...
        echo "message";
    }
    ?>

    <button type"image" src="../Images/plus" onclick="maFonction()">Bouton</button>


    c'est plus ici-------------------
    <?php
    if (!isset($_SESSION['nb'])) $_SESSION['nb'] = 0;
    ?>
    <form method="post"> <!-- BONTON TEST html (il doit etre dans un form) -->
        <input class = "" name="nb" type ="submit" value = "Test" >
    </form>


    <?php
    if (isset($_POST['nb'])) { // Si Lecture du bouton ...
        echo "message2";
    }
    ?>
    -----------------------

    <div id="jeux">
        <h1 class = "jeux">
            Jeux
            </h3>
            <p>
                Voici tous les jeux que nous vous proposons :
            <ul class="item_jeux">
                <?php
                for ($i = 0; $i < sizeof($jeux); $i++) {
                    echo "<ul class='jeux_list'>          
                <img src ='" . $jeux[$i]['id_image'] . "' width='15%' id='blocs'>" . ""
                    . "<div class='nom' id='blocs'>" . $jeux[$i]["nom"] . "</div>"
                    . "<div class='dispo' id='blocs'>" . $jeux[$i]["nombre_reserves"] . "</div>"
                    . "<div class='btnjeux' id='blocs'><form method='post'> 
                <input name='test2' type ='submit' value = '' class='btnjeux'></form></div>
                   
                <?php 
                if (isset(" . $_POST['test2'] . ")) {
                    echo 'message2';
                    } ?>
                    </ul>";
                }
                ?>
            </ul> 
            </p>
    </div>





    <div id="jeux">
        <h1>
            JEUX
        </h1>
        <p>
            Voici tous les jeux que nous vous proposons
        </p>
    </div>
    <div id="matos">
        <h1>
            MATOS
        </h1>
        <p>
            Voici tous les materiel que nous vous proposons
        </p>
    </div>


    <form method="post"> <!-- BONTON TEST html (il doit etre dans un form) -->
        <input class = "" name="test" type ="submit" value = "Test" >
    </form>

    <?php
    if (isset($_POST['test'])) { // Si Lecture du bouton ...
        echo prout;
    }
    ?> 



    <form method="post">
        <input type="text" name="mdp" id="mdp">
        <input type="submit" name="formsend" id=formsend">
    </form>
    <?php
    if (isset($_POST["formsend"])) {
        if ($_POST["mdp"] === "hello") {
            header("Location: ../vue_generale.php");
            die();
        } else {
            echo "Mot de passe incorrect";
        }
    }
    ?>
    <div classe="bigbloc">
        <div class="bloc">
            <div class="element">
                <h4 class="titre">
                    SNACKS
                </h4>
            </div>
        </div>
        <div class="bloc">
            <div class="element">
                <h4 class="titre">
                    JEUX
                </h4>
            </div>
        </div>
        <div class="bloc">
            <div class="element">
                <h4 class="titre">
                    MATERIEL
                </h4>
            </div>
        </div>
    </div>

    <?=
    $nb_snacks;
    echo $snack_name;
    ?>

    <img src="../Images/bounty.jpg" class='img'/>

    <ul class="snacks_objet">
        <?php
        for ($i = 0; $i < sizeof($snacks); $i++) {
            echo "<li class='snacks_list'><img src ='" . $snacks[$i]['lien_img'] . "' width='80px' 'class='img'>" . ""
            . "<div class='snacks_elements' >" . $snacks[$i]["nom"] . ""
            . "</div> prix </li>";
        }
        ?>
    </ul>   

    <footer>
        <p>
            N'hésitez pas à nous contacter pour toute question
        </p>
    </footer>
</body>
</html>



<ul class="item_jeux">
    <?php
    for ($i = 0; $i < sizeof($jeux); $i++) {
        echo "<ul class='jeux_list'>          
                <div class='btnjeux'><form method='post'> 
                <input name='test2' type ='submit' value = '' class='btnjeux'></form></div>
                   
                <?php if (isset(" . $_POST['test2'] . ")) {
                    echo 'message2';
                    } ?>
            </ul>";
    }
    ?>
</ul>