

<html>
    
    <?php
    // DATA 
        include('../../conn.php');
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
            $verif = "verif.php";
            $GET = "GET";
            $mail = "mail";
            $summit = "summit";
            $supprimer = "supprimer";
            $nb = 0;
            $message = "Non";
            
           
            for($i=0;$i<$nb;$i++){
                echo "<form action=".$verif." METHOD=".$GET."> Saisissez @mail : <input name=".$mail."> <BR/>"
                        . "<button type=".$summit.">Valider</button>  
                        <button class = ".$supprimer.">Supprimer</button>  
                        </form>" ;
            }
  
           ?>
           
           
           <?php
           if(isset($_POST['test'])){ // Si Lecture du bouton ...
               if ($message == "Non"){
                   $message = "Oui";
               }
               else {
                  $message = "Non"; 
               }
               
               echo $message;
           }
           ?>
           
           <form method="post"> <!-- Ajout du bouton (il doit etre dans un form) -->
                    <input class = "" name="test" type ="submit" value = "Test" >
           </form>
           
        
       </ul>
       
        <div class ="formulaire_matos">
            
            <div class = "action_email"> 
                
                <div class = "action"> 
                    
                    <form action="verif.php" METHOD="GET">
                        <div class="form"> 
                            Saisissez @mail : <input name="mail1"> <BR/>
                        </div>
                        
                        <div class="form"> 
                            <button type="summit">Valider</button> 
                        </div>
                        
                    </form>
                </div>

                <div class = "action"> 
                    <button class = "modifier">Modifier</button>
                </div>

                <div class = "action"> 
                    <button class = "supprimer">Supprimer</button>
                </div>            
            </div>
            
            <div class = "ajout"> 
                   <form method="post"> <!-- Ajout du bouton (il doit etre dans un form) -->
                        <input class = "" name="ajout" type ="submit" value = "+" >
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

