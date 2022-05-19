<!DOCTYPE html>

<?php
session_start();
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
                <li class="deroulant"><a href="#"><img src="tests/Image_test/Tibou.png" width="100px" height="100px"/> &ensp;</a>
                    <ul class="sous">
                        <li><a href="vue_generale.php" target="_BLANK">Déconnection administrateur</a></li>
                        <li><a href="mentions_legales.php" target="_BLANK">Mentions légales</a></li>
                        <li><a href="contact_respo_site.php" target="_BLANK">Nous contacter</a></li>
                    </ul>
                </li>
            </ul>
        </nav> <!-- bannière -->

        <div class ="intro">
            <p class = "intro"> Bonjour cher vendeur ! </p>
            <p class ='alinea'>Tu es ici en charge de la tenue du fabuleux site de la Taverne BDJ. Ta mission, si tu l'accepte, 
                est d'ajouter, modifier, ou supprimer des items dans les différentes catégories : Snacks, Matériel ou Jeux.
                Tu dois aussi tenir compte des jeux qui ont été empruntés.
                
            <br><br>
        </div>
        
        <!-- 1ere section : snacks -->

        <div id="snacks">
            <h1 class = "titre_part">Snacks</h1>
            <div class="snack_bloc">
                <?php // Modification des données
                    if (!isset($_SESSION['nb'])) $_SESSION['nb'] = 0;

                    if(isset($_POST['ajout'])){ // Si Lecture du bouton ...
                        echo "<div class = 'action_email'> 
                             <div class = 'action'> 
                                <form method='post'>
                                    <input type = 'text' name='snack_name' placeholder='Non du snack' required><br/>
                                    <input type = 'text' name='snack_img' placeholder='Lien image' required><br/>
                                    <input type = 'float' name='snack_prix' placeholder='Prix' required>
                                    <input type='submit' name='form_ajout' if='form_ajout'>
                                </form>
                             </div>
                            </div>";
                        }
                   
                    //Une fois qu'on valide le Form, on effectue cette action
                    if (isset($_POST['form_ajout'])){ //Si on valide le form

                        //On extrait les variables du form. dans ce cas, on retrouve 2 variables, $snack_name et $snack_img (se sont les "name" dans le post)
                        extract($_POST);

                        //On verifie que des valeurs ont bien été rentrées
                        if (!empty($snack_name) && !empty($snack_img) && $snack_prix!=0){

                            //Echo des variables pour verifier visuellement
                            echo $snack_name . '<br/>' . $snack_img . '<br/>' . $snack_prix ;


                            //Inserer des données dans la BDD
                            //On prepaer la requette. Ici, on veut inserer un nom et une img dans le snack. On leur insere les valeurs associées aux variables 'nom' et 'img' (methode securisée)
                            $q = $db -> prepare("INSERT INTO snacks(nom, lien_img, prix, dispo)  VALUES(:nom, :img, :prix, :dispo)");
                            //On execute la requette en attribuant aux variables 'nom' et 'img' les variables du Form
                            $q -> execute([
                                'nom' => $snack_name,
                                'img' => $snack_img,
                                'prix' => $snack_prix,
                                'dispo' => 1
                            ]); 
                        }
                    }
                ?>
                  
                    <div class = "ajout">  <!-- BOUTON + (ajouter) -->
                           <form method='post'> <!-- Ajout du bouton (il doit etre dans un form) -->
                                <input class = "" name="ajout" type ="submit" value = ajouter >
                           </form>
                    </div>

                <?php // AFFICHAGE
                
                for ($i = 0; $i < sizeof($snacks); $i++) {
                    
                    $nb = strval($i);
                    $boutonmodif = "modif$nb";
                    $boutondispo = "dispo$nb";
                    $boutonsupr = "supr$nb";
                    $form_modif = "form_modif$nb";
                    $form_dispo = "form_dispo$nb";
                    $form_supr = "form_supr$nb";
                
                    if ($snacks[$i]["dispo"] != 0) {
                        echo "<ul class='snack_list'><img src ='" . $snacks[$i]['lien_img'] . "' width='15%' id='prout'>" . ""
                        . "<div id='prout' class='nom' >" . $snacks[$i]["nom"] . ""
                        . "</div>" . "<div class='prix' id='prout' ><b> " . $snacks[$i]["prix"] . "€</b>"
                        . "</div> <hr color='#DE9426' size='5px' width='95%'> </ul>";
                    }    
                    // il faut afficher les snack non dispo !
                        
                    // btn modifier
                    echo "<div class='btnjeux'><form method='post'> 
                    <input  name=".$boutonmodif." value='modifier' type='submit' class='btnjeux'></form></div>";

                        if (isset($_POST[$boutonmodif])) {
                        echo "<div class = 'action_email'> 
                             <div class = 'action'> 
                             <div class = 'ancienne donne'> 
                             Nom actuel : ".  $snacks[$i]["nom"] ."<br/> Lien actuel : ". $snacks[$i]['lien_img']."<br/> Prix_actuel : ". $snacks[$i]["prix"]. "
                             </div>
                                <form method='post'>
                                    <input type = 'text' name='snack_name' placeholder='Nouveau nom du snack' required><br/>
                                    <input type = 'text' name='snack_img' placeholder='Nouveau Lien image' required><br/>
                                    <input type = 'float' name='snack_prix' placeholder='Nouveau Prix' required>
                                    <input type='submit' name=".$form_modif." if=".$form_modif.">
                                </form>
                             </div>
                            </div>";
                        }
                        
                        if (isset($_POST[$form_modif])){ //Si on valide le form

                                print_r($_POST);
                                //On extrait les variables du form. dans ce cas, on retrouve 2 variables, $snack_name et $snack_img (se sont les "name" dans le post)
                                extract($_POST);

                                if (!empty($snack_name) && !empty($snack_img) && !empty($snack_prix)){

                                    $q = $db -> prepare("UPDATE snacks set nom = :new_name WHERE nom = :old_name");
                                    $q -> execute([
                                            'old_name' => $snacks[$i]["nom"],
                                            'new_name' => $snack_name,
                                    ]);

                                    $q = $db -> prepare("UPDATE snacks set lien_img = :new_image WHERE lien_img = :old_image");
                                    $q -> execute([
                                            'old_image' => $snacks[$i]['lien_img'],
                                            'new_image' => $snack_img,     
                                    ]);

                                    $q = $db -> prepare("UPDATE snacks set prix = :new_prix WHERE prix = :old_prix");
                                    $q -> execute([
                                            'old_prix' => $snacks[$i]["prix"],
                                            'new_prix' => $snack_prix   

                                    ]);
                                    echo '<br/> modify worked ';
                                }             
                            }

                        /* btn rendre indisponilbe
                        echo "<div class='btnjeux'><form method='post'> 
                        <input  name=".$boutondispo." value='rendre indisponible' type='submit' class='btnjeux'></form></div>";

                            if (isset($_POST[$boutondispo])) {
                                if ($snacks[$i]["dispo"] == 1){
                                        $q = $db -> prepare("UPDATE snacks set dispo = :new_dispo WHERE dispo = :old_dispo");
                                        $q -> execute([
                                                'old_dispo' => $snacks[$i]["dispo"],
                                                'new_dispo' => 0,
                                        ]);
                                        echo '<br/> modify worked ';
                                        
                                }
                                else {
                                        $q = $db -> prepare("UPDATE snacks set dispo = :new_dispo WHERE dispo = :old_dispo");
                                        $q -> execute([
                                                'old_dispo' => $snacks[$i]["dispo"],
                                                'new_dispo' => 1,
                                        ]);
                                        echo '<br/> modify worked ';
                                } 
                                
                            } */   
                            

                        // btn supprimer
                        echo "<div class='btnjeux'><form method='post'> 
                        <input  name=".$boutonsupr." value='supprimer' type='submit' class='btnjeux'></form></div>";        
     
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
        <ul class="item_matos">
            <?php
            for ($i = 0; $i < sizeof($materiel); $i++) {
                echo "<li class='matos_list'><img src ='" . $materiel[$i]['img'] . "' width='50%' 'class='matos_img'>" . ""
                . "<div class='matos_elements' >" . $materiel[$i]["nom"];
            }
            ?>
        </ul>  
    </p>
</div>

<!-- 3eme section : location jeux de société -->
<div id="jeux">
    <h1 class = "titre_part">
        Jeux
        </h3>
        <p>
        <div class="item_jeux">
            <?php
            for ($i = 0; $i < sizeof($jeux); $i++) {
                echo "<form method='post'> 
                <input name='test2' type ='submit' value = 'Test' ></form>"
                . "<ul class='jeux_list'>"
                        
                . "<img src ='" . $jeux[$i]['id_image'] . "' width='15%' id='prout'>" . ""
                . "<div class='nom' id='prout'>" . $jeux[$i]["nom"] . "</div>"
                . "<div class='bloc_nombre' id='prout'><div class='bloc_nombre_item'>Inventaire : " . $jeux[$i]["nombre"] . "</div>"
                . "<div class='bloc_nombre_item'>Réservés : " . $jeux[$i]["nombre_reserves"] . "</div></div></ul>";
            }
            ?>
        </div> 
        </p>
</div>

<footer>
    <p>
        Copyright &copy; BDJ - 2022-2023 - All Right Reserved 
    </p>
</footer>

<?php
?>


</body>
</html>

