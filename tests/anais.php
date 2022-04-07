
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
                     <a href=../accueil.php> <!--//relie a un lien-->
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
            if(isset($_POST["formsend"])){
                if($_POST["mdp"]==="hello"){
                    echo "very very good";
                        
                }
                else{
                    echo "Mot de passe incorrect";
                }
            }
        
        
        
        ?>
        
        
        
        <footer>
            <p>
                N'hésitez pas à nous contacter pour toute question
            </p>
        </footer>
     </body>
 </html>
