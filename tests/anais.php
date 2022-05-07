

<?php
//On se connecte a la bdd, et on recupere les differentes variables
include '../database.php';
global $db;
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



<nav class="menu-nav"> <!--création d'un menu navigation-->
    <ul> <!--//Stocker les differentes puces dans une balise-->
        <div class = "case">
            <li class="btn"> <!--//création d'un nouvelle puce-->
                <a class = "snack" href="#snacks"> <!--//relie a un lien-->
                    Snacks
                </a>
            </li>
        </div>
        <div>
            <li class="btn">
                <a class = "matos" href="#matos" target="_BLANK"> 
                    Matériel
                </a>
            </li>
        </div>
        <div>
            <li class="btn">
                <a class = "jeux" href="#jeux" target="_BLANK"> 
                    Jeux
                </a>
            </li>
        </div>
    </ul>
</nav>


