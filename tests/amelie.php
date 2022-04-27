
<!-- Partie bannière - menu déroulant -->

<html>
    <head>
        <style>

            /* styles de la bannière */
            nav.banniere{
                width: 100%;
                background-color: black;
                position: sticky;
                top : 0px;
                margin : 0px;
                padding : 0px;
                font-family: Lavanderia;
            }

            nav.banniere ul{
                list-style-type: none;
                background-color: black;
            }

            nav.banniere ul li{
                float: none;
                width: 100%;
                text-align: right;
                position: relative;
                background-color: black;
            }

            nav.banniere ul::after{
                display: table;
                clear: both;
                background-color: black;
            }

            nav.banniere a{
                display: block;
                text-decoration: none;
                color: white;
                background-color: black;
                padding: 10px ;
            }

            nav.banniere a:hover{
                color: black;
                background-color: orange;
                transition:0.5s all;
            }

            .sous{
                display: none;
                box-shadow: 0px 1px 2px #CCC;
                background-color: black;
                position: absolute;
                width: 20%;
                z-index: 1000;
            }
            nav > ul li:hover .sous{
                display: block;
            }
            .sous li{
                float: none;
                width: 100%;
                text-align: left;
                margin-right: 20px;
                background-color: black;
            }
            .sous a{
                border-bottom: none;
                background-color: black;
            }
            .sous a:hover{
                border-bottom: none;
                background-color: RGBa(200,200,200,0.1);
            }
            .deroulant > a::after{
                font-size: 12px;
            }

            .conteneur{
                height: 1500px;
                background-color: black;
            }

            h1.banniere {
                color: white;
                text-align: center;
                background-color: black;
                font-weight: 900;
                font-variant : small-caps;
            }


            /* styles de la page principale*/

            h1.snack   {
                background-color: #FF7700;
                color: white;
                font-variant : small-caps;
            }

            h1.matos   {
                background-color: #FF9435;
                color: white;
                font-variant : small-caps;
            }

            h1.jeux   {
                background-color: #FFAC58;
                color: white;
                font-variant : small-caps;
            }

            p          {
                color: black;
                font-size: 20px;
                font-style: italic;
            }

            div.intro {
                padding : 30px;
            }

            p.intro    {
                color: black;
                font-size: 30px;
                font-style: italic;
                font-variant : small-caps;
            }

            /*Style des boutons snacks matos et jeux*/

            nav.menu-nav ul li.btn{
                display: inline-block;
                list-style-type: none;
            }

            nav.menu-nav ul li.btn a{
                color: white;
                text-decoration: none;
                padding : 10px;
                border : #FF4D00;
                position : center;
                border-radius: 100px;
                border: 4px double #cccccc;
                font-size : 30px;
                width : 100%;
                text-align: center;
            }

            a.snack {
                background-color: #FF7700 ;
            }

            a.matos {
                background-color: #FF9435 ;
            }

            a.jeux {
                background-color: #FFAC58 ;
            }

            nav.menu-nav ul li.btn:hover a{
                color: black;
                transition:0.5s all;
                background-color: #FFAC58 ;
            }

            /*Style des items dans la liste snacks*/
            ul.item_snack{
                list-style-type: none;
                padding:10px;
            }

        </style> <!-- styles -->
    </head>

    <body> 

        <h1 class = "banniere">Taverne BDJ</h1>
        <nav class = "banniere">
            <ul>
                <li class="deroulant"><a href="#"><img src="Image_test/Tibou.jpg"> &ensp;</a>
                    <ul class="sous">
                        <li><a href="anais.php" target="_BLANK">Connection administrateur</a></li>
                        <li><a href="https://fr.wikipedia.org/wiki/Raclette" target="_BLANK">Mentions légales</a></li>
                        <li><a href="https://fr.wikipedia.org/wiki/Saucisson" target="_BLANK">Nous contacter</a></li>
                    </ul>
                </li>
            </ul>
        </nav> <!-- bannière -->

        <div class ="intro">
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
        </div>
        <!-- 1ere section : snacks -->

        <div id="snacks">
            <h1 class = "snack">
                Snacks
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
            Matériel
        </h1>
        <p>
            Voici tout le matériel que nous vous proposons :
        </p>
    </div>

    <!-- 3eme section : location jeux de société -->
    <div id="jeux">
        <h1 class = "jeux">
            Jeux
            </h3>
            <p>
                Voici tous les jeux que nous vous proposons :
            </p>
    </div>
</body>
</html>
