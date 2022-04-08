<!--                                    



                                            Partie bannière - menu déroulant


<!doctype html>
<html>

    <head> 
<!--
       <style>
           *{
               margin : 0px;
               padding : 0px
           }
           nav {
               width : 100%;
               margin: 0px;
               background-color: black;
               position: sticky;
               top : 0px;
           }
           nav ul {
               list-style-type: none;
           }
           nav ul li {
               float : right;
               width: 25%;
               text-align: center;
               position : relative;
           }
           nav ul::after {
               content : "";
               display : table;
               clear : both;
           }
           nav a {
               display: block;
               text-decoration: none;
               color : white ;
               border-bottom: 2px solid black;
               padding : 10px 0px;
           }
           nav a:hover{
               color : orange;
               border-bottom: 2px solid goldenrod;
           }
           .sous{
               display : none;
               box-shadow: 0px 1px 2px #CCC;
               background-color: black;
               position: absolute;
               width : 100%;
               z-index : 1000;
           }
           nav > ul li:hover.sous{
               display: block;
           }
           .sous li {
               float: none;
               width: 100%;
               text-align: left;
           }
           .sous a{
               padding: 10px;
               border-bottom: none;
           }
           .sous a:hover{
               border-bottom: none;
               background-color: white;
           }
           .deroulant > a::after{
               front-size : 12px;
           }

       </style>-->
<!--
        <style>
            
            ul { /* forme et placement de toute la bannière */
                list-style-type: none;
                overflow: hidden;
                background-color: #333;
                position : fixed;
                width: 100%;
                margin : 0px;
                padding: 0px;
            }

            li { /*placement du bouton de menu déroulant*/
                float: right;
            }

            li a, .dropbtn { /*mise en forme du bouton*/
                display: block;
                color: white;
                text-align: center;
                padding: 10px 10px;
                text-decoration: none;
            }

            li a:hover, .dropdown:hover .dropbtn { /*couleur de surbrillance du bouton*/
                background-color: #FFAB00;
            }

            li.dropdown { /*affichage du bouton*/
                display: block;
                text-align: right;
            }

            .dropdown-content { /*mise en forme du menu déroulant*/
                position: fixed;
                background-color: #f9f9f9;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            }

            .dropdown-content a { /*style des liens*/
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                text-align: left;
            }

            .dropdown-content a:hover { /* couleur de surbrillance des liens*/
                background-color: #f1f1f1;
            } 

            .show {
                display:block;
                z-index: 1000;
            }


            h1.banniere {
                color: white;
                text-align: center;
            }

            p.faire_du_vide {
                color : white;
            }
        </style>-->
<!--        <style>*{
        margin: 0px;
        padding: 0px;
        font-family: Avenir, sans-serif;
    }

    nav{
        width: 100%;
        margin: 0 auto;
        background-color: white;
        position: sticky;
        top: 0px;
    }

    nav ul{
        list-style-type: none;
    }

    nav ul li{
        float: left;
        width: 25%;
        text-align: center;
        position: relative;
    }

    nav ul::after{
        content: "";
        display: table;
        clear: both;
    }

    nav a{
        display: block;
        text-decoration: none;
        color: black;
        border-bottom: 2px solid transparent;
        padding: 10px 0px;
    }

    nav a:hover{
        color: orange;
        border-bottom: 2px solid gold;
    }

    .sous{
        display: none;
        box-shadow: 0px 1px 2px #CCC;
        background-color: white;
        position: absolute;
        width: 100%;
        z-index: 1000;
    }
    nav > ul li:hover .sous{
        display: block;
    }
    .sous li{
        float: none;
        width: 100%;
        text-align: left;
    }
    .sous a{
        padding: 10px;
        border-bottom: none;
    }
    .sous a:hover{
        border-bottom: none;
        background-color: RGBa(200,200,200,0.1);
    }
    .deroulant > a::after{
        content:" ▼";
        font-size: 12px;
    }</style>
</head> 

<body>
<nav>
    <ul>
        <li class="deroulant"><a href="#">Cours Complets &ensp;</a>
            <ul class="sous">
                <li><a href="#">Cours HTML et CSS</a></li>
                <li><a href="#">Cours JavaScript</a></li>
                <li><a href="#">Cours PHP et MySQL</a></li>
            </ul>
        </li>
        <li class="deroulant"><a href="#">Articles &ensp;</a>
            <ul class="sous">
                <li><a href="#">CSS display</a></li>
                <li><a href="#">CSS position</a></li>
                <li><a href="#">CSS float</a></li>
            </ul>
        </li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">A propos</a></li>
    </ul>
</nav>


<ul>
    <h1 class = "banniere">TaverneBDJ</h1>
    <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn" onclick="myFunction()"><img src="Image_test/Tibou.jpg"></a>
        <div class="dropdown-content" id="myDropdown">
            <a href="https://fr.wikipedia.org/wiki/Licorne" target="_BLANK">Connection administrateur</a>
            <a href="https://fr.wikipedia.org/wiki/Raclette" target="_BLANK">Mentions légales</a>
            <a href="https://fr.wikipedia.org/wiki/Saucisson" target="_BLANK">Nous contacter</a>
        </div>
    </li>
</ul>



<script>
    /* When the user clicks on the button, 
     toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function (e) {
        if (!e.target.matches('.dropbtn')) {

            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var d = 0; d < dropdowns.length; d++) {
                var openDropdown = dropdowns[d];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
<p class = "faire_du_vide">.</p>
<p class = "faire_du_vide">.</p>
<p class = "faire_du_vide">.</p>
<p class = "faire_du_vide">.</p>
<p class = "faire_du_vide">.</p>
<p class = "faire_du_vide">.</p>

<img src="Image_test/le_saucisson.jpg"> 
<img src="Image_test/le_saucisson.jpg">
<img src="Image_test/le_saucisson.jpg">
<img src="Image_test/le_saucisson.jpg">
</body>

</html>-->



<!-- Partie style page accueil -->

<html>

    <head>
        <meta charset="UTF-8">
        
        <style>
            h1.snack   {
                background-color: #FF7700; 
                color: white;
            }
            
            h1.matos   {
                background-color: #FF9435; 
                color: white;
            }
            
            h1.jeux   {
                background-color: #FFAC58; 
                color: white;
            }

            p.intro    {
                color: black;
                font-size: 25px;
                font-style: italic;
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
                border-radius: 100px;
                border: 4px double #cccccc;
                font-size : 30px;
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
                background-color: #FFAC58 ;
                transition:0.5s all;
            }
            
        </style>
    </head>

    <body>
        
        <!-- insérer le code pour la bannière -->
        
        <p> Introduction </p>

        <!-- 3 BOUTONS -->
        <nav class="menu-nav"> <!--création d'un menu navigation-->
            <ul> <!--//Stocker les differentes puces dans une balise-->
                <li class="btn"> <!--//création d'un nouvelle puce-->
                    <a class = "snack" href=../accueil.php> <!--//relie a un lien-->
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

