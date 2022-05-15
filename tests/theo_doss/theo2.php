<?php
session_start(); // démarrage de la session pour sauvegarder les variable (doit etre la première ligne du code)
?>

<html>
    
    <?php
    // DATA
        include('../../conn.php');
    
        
    // Lien : http://localhost/tavernebdj/tests/theo_doss/theo3.php http://localhost/tavernebdj/session.php
        ?>
    
    
    <meta charset="UTF-8"> 
    <link rel="stylesheet" href="style_theo_2.css"/>
    
    <header>
        <title>Si tu lis ce message t'es beau</title>
        <<p class="En_tete">En-tête</p>
    </header>

    
    <body>
        
       <h1 class="Titre">TavernBDJ</h1>
        
       <ul class="snacks_objet">
            <?php
            for($i=0;$i<sizeof($snacks);$i++){
                echo "<li class='snacks_list'>"
                        . "<img src ='".$snacks[$i]['lien_img']."' width='100px' 'class='img'>". ""
                        . "<div class='snacks_elements' >".$snacks[$i]["nom"].""
                        . "<div class='prix'> prix"
                    ." </li>";
                
            }
            ?>
        </ul>
       
       <ul class ="Matériel">
           
            <?php
 
            if (!isset($_SESSION['nb'])) $_SESSION['nb'] = 0;
           
            
            if(isset($_POST['ajout'])){ // Si Lecture du bouton ...
               $_SESSION['nb'] += 1;
               echo $_SESSION['nb'];
           }
           
           if(isset($_POST['zero'])){ // Si Lecture du bouton ...
               $_SESSION['nb'] = 0;
               echo $_SESSION['nb'];
           }
            
            
            for($i=0;$i<$_SESSION['nb'];$i++){ // *ici* voir note plus bas

                echo "<div class = 'action_email'> 
                
                <div class = 'action'> 
                    
                    <form action='verif.php' METHOD='GET'>
                        <div class='form'>
                            Saisissez @mail : <input name='mail'> <BR/>
                        </div>
                        
                        <div class='form'> 
                            <button type='summit'>Valider</button> 
                        </div>
                        
                    </form>
                </div>

                <div class = 'action'> 
                    <button class = 'modifier'>Modifier</button>
                </div>

                <div class = 'action'> 
                    <button class = 'supprimer'>Supprimer</button>
                </div>            
            </div>";
            }
  
           ?>
           
         
           <?php // Bouton TEST php on/off
           $message = "Non";
           if (!isset($_SESSION['appuyer'])) $_SESSION['appuyer'] = false;
           
           if(isset($_POST['test'])){ // Si Lecture du bouton ...
               if ($_SESSION['appuyer'] == false){
                   $_SESSION['appuyer'] = true;
                   $message = "C'est allumé";
               }
               else {
                  $message = "C'est éteint";
                  $_SESSION['appuyer'] = false;
               }
               
               echo $message;
           }
           ?>
           
           <form method="post"> <!-- BONTON TEST html (il doit etre dans un form) -->
                    <input class = "" name="test" type ="submit" value = "Test" >
           </form>
           
        
       </ul>
       
       <div class ="formulaire_matos"> <!-- permet d'afficher le formulaire et les boutons à coté (cette partit est utiliser pour écho ensuite dans du php *ici*  -->
            
           <div class = "ajout">  <!-- BOUTON + (ajouter) -->
                   <form method="post"> <!-- Ajout du bouton (il doit etre dans un form) -->
                        <input class = "" name="ajout" type ="submit" value = image src =https://www.enpaysdelaloire.com/sites/default/files/styles/ogimage/public/edito/produits/images/Foret-de-Mervent.jpg?itok=UDg46oH8" >
                   </form>
            </div>
           
           <div class = "zero">  <!-- BOUTON + (ajouter) -->
                   <form method="post"> <!-- Ajout du bouton (il doit etre dans un form) -->
                        <input class = "" name="zero" type ="submit" value = "0" >
                   </form>
            </div>
            
        </div>
        
        <footer>
            <p>
                Copyright &copy; BDJ - 2022-2023 - All Right Reserved 
            </p>

        </footer>
    </body>
    
</html>

