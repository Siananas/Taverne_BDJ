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
                <li class="deroulant"><a href="#"><img src="tests/Image_test/Tibou.jpg" width="100px" height="100px"/> &ensp;</a>
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
            <h1 class = "snack">Snacks</h1>
            <ul class="snack_bloc">
                <?php // Modification des données
                    if (!isset($_SESSION['nb'])) $_SESSION['nb'] = 0;

                    if(isset($_POST['ajout'])){ // Si Lecture du bouton ...
                        echo "<div class = 'action_email'> 
                             <div class = 'action'> 
                                <form method='post'>
                                    <input type = 'text' name='snack_name' placeholder='Non du snack' required><br/>
                                    <input type = 'text' name='snack_img' placeholder='Lien image' required><br/>
                                    <input type = 'float' name='snack_prix' placeholder='Prix' required>
                                    <input type='submit' name='formsend' if='formsend'>
                                </form>
                             </div>
                            </div>";
                        }
                    if(isset($_POST['modif'])){ // Si Lecture du bouton ...
                        echo "<div class = 'action_email'> 
                             <div class = 'action'> 
                                <form method='post'>
                                    <input type = 'text' name='snack_name' placeholder='Non du snack' required><br/>
                                    <input type = 'text' name='snack_img' placeholder='Lien image' required><br/>
                                    <input type = 'float' name='snack_prix' placeholder='Prix' required>
                                    <input type='submit' name='formsend' if='formsend'>
                                </form>
                             </div>
                            </div>";
                        }
                   
                    //Une fois qu'on valide le Form, on effectue cette action
                    if (isset($_POST['formsend'])){ //Si on valide le form

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
                
                
                <div class ="formulaire_matos"> <!-- permet d'afficher le formulaire et les boutons à coté (cette partit est utiliser pour écho ensuite dans du php *ici*  -->            
                    <div class = "ajout">  <!-- BOUTON + (ajouter) -->
                           <form method='post'> <!-- Ajout du bouton (il doit etre dans un form) -->
                                <input class = "" name="ajout" type ="submit" value = ajouter >
                           </form>
                    </div>
                </div>
                
                
                
                
                
                <?php // AFFICHAGE
                
                for ($i = 0; $i < sizeof($snacks); $i++) {
                    if ($snacks[$i]["dispo"] != 0) {
                        echo "<ul class='snack_list'><img src ='" . $snacks[$i]['lien_img'] . "' width='15%' id='prout'>" . ""
                        . "<div id='prout' class='nom' >" . $snacks[$i]["nom"] . ""
                        . "</div>" . "<div class='prix' id='prout' ><b> " . $snacks[$i]["prix"] . "€</b>"
                        . "</div> <hr color='#DE9426' size='5px' width='95%'> </ul>";
                    }
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
        <ul class="item_matos">
            <?php
            for ($i = 0; $i < sizeof($materiel); $i++) {
                echo "<li class='matos_list'><img src ='" . $materiel[$i]['lien_img'] . "' width='80px' 'class='img'>" . ""
                . "<div class='matos_elements' >" . $materiel[$i]["nom"];
            }
            ?>
        </ul>  
    </p>
</div>

<!-- 3eme section : location jeux de société -->
<div id="jeux">
    <h1 class = "jeux">
        Jeux
        </h3>
        <p>
        <ul class="item_jeux">
            <?php
            for ($i = 0; $i < sizeof($jeux); $i++) {
                echo "<form method='post'> 
                <input name='test2' type ='submit' value = 'Test' ></form>"
                
                . "<ul class='jeux_list'><img src ='" . $jeux[$i]['id_image'] . "' width='15%' id='prout'>" . ""
                . "<div class='nom' id='prout'>" . $jeux[$i]["nom"] . "</div>"
                . "<img src =Images/plus width='5%' id='prout'>"
                . "<div class='dispo' id='prout'>" . $jeux[$i]["nombre_reserves"] . "</div></ul>";
            }
            ?>
        </ul> 
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

