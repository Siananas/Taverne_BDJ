

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

<section class="u-align-center u-clearfix u-gradient u-section-1" id="carousel_75d8">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-expanded-width u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <div class="u-align-center u-container-style u-custom-item u-list-item u-radius-20 u-repeater-item u-white u-list-item-1">
              <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
                <h4 class="u-custom-item u-text u-text-palette-3-base u-text-1">Snacks</h4><span class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-custom-item u-file-icon u-icon u-opacity u-opacity-55 u-text-palette-3-base u-icon-1"><img src="images/5.png" alt=""></span>
              </div>
            </div>
            <div class="u-align-center u-container-style u-custom-item u-list-item u-palette-3-base u-radius-20 u-repeater-item u-shape-round u-video-cover u-list-item-2">
              <div class="u-container-layout u-similar-container u-valign-top u-container-layout-2">
                <h4 class="u-custom-item u-text u-text-body-alt-color u-text-2">Jeux</h4><span class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-custom-item u-icon u-opacity u-opacity-55 u-text-white u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 507.971 507.971" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-f57a"></use></svg><svg class="u-svg-content" viewBox="0 0 507.971 507.971" id="svg-f57a"><g id="XMLID_1477_"><path id="XMLID_1483_" d="m333.696 213.433c5.272-2.056 7.053-2.747 23.624 1.301l46.526 11.778.12.03c27.078 6.62 48.859-28.524 53.763-37.189 5.517-8.342 7.47-18.303 5.499-28.141-2.021-10.093-7.904-18.714-16.564-24.275-6.386-4.102-16.288-12.189-27.754-21.554-22.364-18.266-52.993-43.28-85.469-61.506-6.547-3.674-13.414-6.528-20.525-8.537l-.259-45.34-15.491.599c-1.565.061-15.722.828-30.501 9.017-12.157 6.736-26.569 19.508-31.789 43.152-9.16.926-22.034 3.343-36.854 9.313-25.458 10.256-61.853 33.544-90.658 86.253-13.734 25.13-25.362 73.345-31.106 128.976-3.625 35.112-4.304 76.13-1.614 97.531l1.65 13.13h49.119c-.347.773-.693 1.527-1.038 2.246-4.681 9.77-9.658 16.039-12.79 19.421h-10.475c-17.506 0-31.749 14.242-31.749 31.749v36.584h-25.366v30h408v-30h-25.366v-36.584c0-17.507-14.243-31.749-31.749-31.749h-18.426c1.509-12.725 1.99-32.949-10.9-60.974-15.439-33.563-31.919-65.015-45.161-90.285-6.804-12.984-14.142-26.988-19.241-37.554.886-.077 1.771-.166 2.655-.267 16.396-1.87 24.516-5.033 29.889-7.125zm-230.333 144.538c-.977-20.828.021-51.285 2.736-77.581 5.275-51.095 15.847-96.183 27.589-117.67 7.768-14.215 16.432-26.632 25.941-37.217-21.947 43.021-29.617 103.402-23.416 184.035 1.484 19.291.416 35.329-1.882 48.433zm291.517 81.667c.964 0 1.749.784 1.749 1.749v36.584h-297.268v-36.584c0-.965.785-1.749 1.749-1.749zm-127.702-221.796c3.688 10.434 11.857 26.246 26.642 54.461 13.082 24.966 29.363 56.037 44.479 88.898 10.82 23.522 9.339 38.396 7.894 48.437h-198.173c11.226-20.311 21.89-53.189 18.106-102.4-6.127-79.678 2.237-139.052 24.86-176.475 17.66-29.212 40.662-40.498 62.709-49.555l8.74-3.591.536-9.434c.856-15.075 6.557-25.499 17.427-31.867.819-.48 1.641-.921 2.458-1.324l.203 35.653 12.92 1.743c7.99 1.078 15.655 3.652 22.78 7.65 30.2 16.948 59.662 41.01 81.173 58.579 12.679 10.355 22.693 18.534 30.519 23.561 2.371 1.522 3.123 3.739 3.36 4.926.238 1.187.397 3.525-1.206 5.847l-.414.604-.345.616c-6.68 11.931-17.019 22.58-20.994 23.169l-46.235-11.705-.12-.03c-23.373-5.712-30.652-4.426-41.689-.127-4.626 1.802-9.87 3.844-22.404 5.274-8.047.919-16.162.398-24.117-1.546-6.456-1.577-12.609-4.052-18.288-7.354l-15.08 25.934c7.58 4.407 15.731 7.785 24.259 10.056z"></path><path id="XMLID_1488_" d="m310.526 141.971c7.846 0 15.363-6.899 15-15-.364-8.127-6.591-15-15-15-7.846 0-15.363 6.899-15 15 .365 8.127 6.591 15 15 15z"></path>
</g></svg></span>
              </div>
            </div>
            <div class="u-align-center u-container-style u-custom-item u-list-item u-radius-20 u-repeater-item u-video-cover u-white u-list-item-3">
              <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3">
                <h4 class="u-custom-item u-text u-text-palette-3-base u-text-3">Materiel</h4><span class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-custom-item u-file-icon u-icon u-opacity u-opacity-55 u-text-palette-3-base u-icon-3"><img src="images/6.png" alt=""></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


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
