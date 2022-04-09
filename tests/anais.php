
 <!DOCTYPE html>
 <<html>
     <head>
         <meta charset="UTF-8">
         <title>title</title>
             <link rel="stylesheet" href="style_anais2.css"/>

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
                    header("Location: ../accueil.php");
                    die();
                }
                else{
                    echo "Mot de passe incorrect";
                }
            }
        ?>
        
        <?php
        //Connect to databse
        $conn = mysqli_connect('localhost','general','root','taverne_bdj');

        //if connection=false
        if(!$conn){
            echo 'Connection error: ' . mysqli_connect_error();
        }

        // Write querry for all users
        $sql = 'SELECT * FROM snacks';

        //Make query and get resuklt
        $result = mysqli_query($conn, $sql);
        //Fetch the resulting row in an array
        $snacks = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //print_r($snacks[1]["nom"]);

        //Print the array
        //print_r($snacks);
        
        
        $nombre_snacks = sizeof($snacks);
        
        print_r($nombre_snacks);
        ?>
        
        <?= $nombre_snacks ;?>
        
        
        
        <ul class="snacks_objet">
            <?php
            for($i=0;$i<sizeof($snacks);$i++){
                echo "<li class='snacks_list'><img src ='".$snacks[$i]['lien_img']."' width='80px' 'class='img'><div class='snacks_elements' >".$snacks[$i]["nom"]."</div> prix </li>";
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
