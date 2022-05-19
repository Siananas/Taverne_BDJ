
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

                <?php
                // BTN AJOUTER
                if (isset($_POST['ajout_snack'])) { // Si Lecture du bouton ...
                    echo "<div class = 'action_email'> 
                             <div class = 'action' > 
                                <form method='post' class='champ_modif'>
                                <div >
                                    <input type = 'text' name='snack_name' placeholder='Nom du snack' required class='item'><br/>
                                    <input type = 'text' name='snack_img' placeholder='Lien image' required class='item'><br/>
                                    <input type = 'float' name='snack_prix' placeholder='Prix' required class='item'><br/>
                                    <input type='submit' name='form_ajout' if='form_ajout' class='item'> </div>
                                    <hr color='#DE9426' size='3px' width='50%'>
                                </form>
                             </div>
                            </div>";
                }

                //Une fois qu'on valide le Form, on effectue cette action
                if (isset($_POST['form_ajout'])) { //Si on valide le form
                    //On extrait les variables du form. dans ce cas, on retrouve 2 variables, $snack_name et $snack_img (se sont les "name" dans le post)
                    extract($_POST);

                    //On verifie que des valeurs ont bien été rentrées
                    if (!empty($snack_name) && !empty($snack_img) && $snack_prix != 0) {

                        //Echo des variables pour verifier visuellement
                        echo $snack_name . '<br/>' . $snack_img . '<br/>' . $snack_prix;

                        //Inserer des données dans la BDD
                        //On prepaer la requette. Ici, on veut inserer un nom et une img dans le snack. On leur insere les valeurs associées aux variables 'nom' et 'img' (methode securisée)
                        $q = $db->prepare("INSERT INTO snacks(nom, lien_img, prix, dispo)  VALUES(:nom, :img, :prix, :dispo)");
                        //On execute la requette en attribuant aux variables 'nom' et 'img' les variables du Form
                        $q->execute([
                            'nom' => $snack_name,
                            'img' => $snack_img,
                            'prix' => $snack_prix,
                            'dispo' => 1
                        ]);
                    }
                }

                // BTN MODIFICATION
                // Affichage du formulaire pour selectionner l'objet à modifier
                if (isset($_POST['modif_snack'])) {
                    echo "<div class = 'action_email'> 
                         <div class = 'action'> 
                            <form method='post'>
                                <input type = 'text' name='snack_name' placeholder='Nom actuel' required class='item'><br/>
                                <input type='submit' name='selection_modif_snack' if='selection_snack' class='item'> 
                                <hr color='#DE9426' size='3px' width='50%'>
                            </form>
                         </div>
                        </div>";
                }

                // Affichage du formulaire de modification
                if (isset($_POST['selection_modif_snack'])) {
                    extract($_POST);
                    if (!empty($snack_name)) {

                        // On récupère les données des items ayant le nom rentré par l'utilisateur 
                        $sql = $db->prepare("SELECT * FROM snacks WHERE nom = :name");
                        $sql->execute(
                                [
                                    'name' => $snack_name
                        ]);
                        $snacks_cible = $sql->fetchAll(\PDO::FETCH_ASSOC);

                        for ($i = 0; $i < sizeof($snacks_cible); $i++) {

                            // Aficchage des anciennes données
                            echo "<div class = 'ancienne donne' class='item'> 
                                <div class='item'><b>Nom actuel : </b>" . $snacks_cible[$i]["nom"] . "<br/> <b>Lien actuel : </b>" . $snacks_cible[$i]['lien_img'] . "<br/> <b>Prix_actuel : </b>" . $snacks_cible[$i]["prix"] . "€
                                </div></div>";
                        }

                        // Nouveau form
                        echo "<div class = 'action_email'> 
                                <div class = 'action'> 
                                   <form method='post'>
                                       <input type = 'text' name='snack_name' placeholder='Nouveau nom du snack' required class='item'><br/>
                                       <input type = 'text' name='snack_img' placeholder='Nouveau Lien image' required class='item'><br/>
                                       <input type = 'float' name='snack_prix' placeholder='Nouveau Prix' required class='item'></br>
                                       <input type='submit' name='form_snack_modif' if='form_modif' class='item'> 
                                       <hr color='#DE9426' size='3px' width='50%'>
                                   </form>
                                </div>
                               </div>";
                    }
                }

                // Modification des données MODIF
                if (isset($_POST['form_snack_modif'])) {
                    extract($_POST);
                    if (!empty($snack_name)) {

                        // On récupère les données des items ayant le nom rentré par l'utilisateur 
                        $sql = $db->prepare("SELECT * FROM snacks WHERE nom = :name");
                        $sql->execute(
                                [
                                    'name' => $snack_name
                        ]);
                        $snacks_cible = $sql->fetchAll(\PDO::FETCH_ASSOC);

                        for ($i = 0; $i < sizeof($snacks_cible); $i++) {
                            $q = $db->prepare("UPDATE snacks set nom = :new_name WHERE nom = :old_name");
                            $q->execute([
                                'old_name' => $snacks_cible[$i]["nom"],
                                'new_name' => $snack_name,
                            ]);

                            $q = $db->prepare("UPDATE snacks set lien_img = :new_image WHERE nom = :old_image");
                            $q->execute([
                                'old_name' => $snacks_cible[$i]["nom"],
                                'new_image' => $snack_img,
                            ]);

                            $q = $db->prepare("UPDATE snacks set prix = :new_prix WHERE nom = :old_name");
                            $q->execute([
                                'old_name' => $snacks_cible[$i]["nom"],
                                'new_prix' => $snack_prix
                            ]);
                            echo '<br/> modify worked ';
                        }
                    }
                }

                // BTN DISPO
                // Affichage du formulaire pour selectionner l'objet à modifier
                if (isset($_POST['dispo_snack'])) {
                    echo "<div class = 'action_email'> 
                         <div class = 'action'> 
                            <form method='post'>
                                <input type = 'text' name='snack_name' placeholder='Nom actuel' required class='item'><br/>
                                <input type='submit' name='selection_snack' if='selection_snack' class='item'> 
                                <hr color='#DE9426' size='3px' width='50%'>
                            </form>
                         </div>
                        </div>";
                }
                
                // Modification des données DISPO
                if (isset($_POST['selection_dispo_snack'])) {
                    extract($_POST);
                    if (!empty($snack_name)) {

                        $sql2 = $db->prepare("SELECT * FROM snacks WHERE nom = :name");
                        $sql2->execute(
                            [
                                'name' => $snack_name
                            ]);
                        $snacks_cible = $sql2->fetchAll(\PDO::FETCH_ASSOC);

                        for ($i = 0; $i < sizeof($snacks_cible); $i++) {

                            if ($snacks_cible[$i]["dispo"] == 0) {
                                $q = $db->prepare("UPDATE snacks set dispo = :new_dispo WHERE nom = :name");
                                $q->execute([
                                'name' => $snacks_cible[$i]["nom"],
                                'new_dispo' => 1
                                ]);
                                echo $snacks_cible[$i]["nom"]." est maintenant disponible !";
                            }
                            else {
                                $q = $db->prepare("UPDATE snacks set dispo = :new_dispo WHERE nom = :name");
                                $q->execute([
                                'name' => $snacks_cible[$i]["nom"],
                                'new_dispo' => 0
                                ]);
                                echo $snacks_cible[$i]["nom"]." n'est plus disponible disponible.";
                            }
                              
                        }
                    }
                }   

                
                // BTN SUPRIMER
                // Affichage du formulaire pour selectionner l'objet à modifier
                if (isset($_POST['supr_snack'])) {
                    echo "<div class = 'action_email'> 
                         <div class = 'action'> 
                            <form method='post'>
                                <input type = 'text' name='snack_name' placeholder='Nom actuel' required><br/>
                                <input type='submit' name='selection_supr_snack' if='selection_dispo_snack'> 
                            </form>
                         </div>
                        </div>";
                }
                
                // Modification des données SUPR
                if (isset($_POST['selection_supr_snack'])) {
                    extract($_POST);
                    if (!empty($snack_name)) {
                        $sql2 = $db->prepare("DELETE FROM snacks WHERE nom = :name");
                        $sql2->execute(
                            [
                                'name' => $snack_name
                            ]);
                        echo $snack_name." a été suprimer.";
       
                    }
                }
                
                ?>

                <!-- Ajout des boutons SNACKS HTML -->
                <div class = "ajout_snack" id='inline'>
                    <form method='post'> <!-- Ajout du bouton (il doit etre dans un form) -->
                        <input class = "" name="ajout_snack" type ="submit" value = Ajouter id='btn_modif'>
                    </form>
                </div>

                <div class = "modif_snack" id='inline'>
                    <form method='post'> 
                        <input class = "" name="modif_snack" type ="submit" value = Modifier id='btn_modif'>
                    </form>
                </div>

                <div class = "dispo_snack" id='inline'>
                    <form method='post'> 
                        <input class = "" name="dispo_snack" type ="submit" value = "Disponibilité" id='btn_modif'>
                    </form>
                </div>

                <div class = "supr_snack" id='inline'>
                    <form method='post'> 
                        <input class = "" name="supr_snack" type ="submit" value = Supprimer id='btn_modif'>
                    </form>
                </div>

                <?php
// AFFICHAGE

                for ($i = 0; $i < sizeof($snacks); $i++) {
                    echo "<ul class='snack_list'><img src ='" . $snacks[$i]['lien_img'] . "' width='15%' id='prout'>" . ""
                    . "<div id='prout' class='nom' >" . $snacks[$i]["nom"] . ""
                    . "</div>" . "<div class='prix' id='prout' ><b> " . $snacks[$i]["prix"] . "€</b>"
                    . "</div> <hr color='#8d6951' size='5px' width='95%'> </ul>";
                }
                ?>
            </div>
        </p>
    </div>



    <!-- 2eme section : matériel -->

    <div id="matos" class='matos_bloc'>
        <h1 class = "titre_part">
            Matériel
        </h1>
        <p>
        <ul class="item_matos">
            <?php
            for ($i = 0; $i < sizeof($materiel); $i++) {
                echo "<ul class='matos_list'><img src ='" . $materiel[$i]['img'] . "' width='50%' 'class='matos_img'>" . ""
                . "<div class='nom' >" . $materiel[$i]["nom"] . ""
                . "</div><div class='dispo'>" . $materiel[$i]["nombre"] . " disponibles"
                . "</div></ul>";
            }
            ?>
        </ul>  
    </p>
    <!-- Ajout des boutons MATERIEL HTML -->
    <div class = "ajout_matos" id='inline'>
        <form method='post'> <!-- Ajout du bouton (il doit etre dans un form) -->
            <input class = "" name="ajout_matos" type ="submit" value = Ajouter id='btn_modif'>
        </form>
    </div>

    <div class = "modif_matos" id='inline'>
        <form method='post'> 
            <input class = "" name="modif_matos" type ="submit" value = Modifier id='btn_modif'>
        </form>
    </div>


    <div class = "supr_matos" id='inline'>
        <form method='post'> 
            <input class = "" name="supr_matos" type ="submit" value = Supprimer id='btn_modif'>
        </form>
    </div>
</div>



<!-- 3eme section : location jeux de société -->

                


<div id="jeux" class='jeux_bloc'>
    <h1 class = "titre_part">
        Jeux
    </h1>

        <?php
                // BTN AJOUTER
                if (isset($_POST['ajout_jeux'])) { // Si Lecture du bouton ...
                    echo "<div class = 'action_email'> 
                             <div class = 'action'> 
                                <form method='post'>
                                    <input type = 'text' name='jeux_name' placeholder='Nom du jeux' required><br/>
                                    <input type = 'text' name='jeux_img' placeholder='Lien image' required><br/>
                                    <input type = 'float' name='jeux_prix' placeholder='Prix' required><br/>
                                    <input type='submit' name='form_ajout' if='form_ajout'>
                                </form>
                             </div>
                            </div>";
                }

                //Une fois qu'on valide le Form, on effectue cette action
                if (isset($_POST['form_ajout'])) { //Si on valide le form
                    //On extrait les variables du form. dans ce cas, on retrouve 2 variables, $jeux_name et $jeux_img (se sont les "name" dans le post)
                    extract($_POST);

                    //On verifie que des valeurs ont bien été rentrées
                    if (!empty($jeux_name) && !empty($jeux_img) && $jeux_prix != 0) {

                        //Echo des variables pour verifier visuellement
                        echo $jeux_name . '<br/>' . $jeux_img . '<br/>' . $jeux_prix;

                        //Inserer des données dans la BDD
                        //On prepaer la requette. Ici, on veut inserer un nom et une img dans le jeux. On leur insere les valeurs associées aux variables 'nom' et 'img' (methode securisée)
                        $q = $db->prepare("INSERT INTO jeux(nom, id_image, prix, dispo)  VALUES(:nom, :img, :prix, :dispo)");
                        //On execute la requette en attribuant aux variables 'nom' et 'img' les variables du Form
                        $q->execute([
                            'nom' => $jeux_name,
                            'img' => $jeux_img,
                            'prix' => $jeux_prix,
                            'dispo' => 1
                        ]);
                    }
                }

                // BTN MODIFICATION
                // Affichage du formulaire pour selectionner l'objet à modifier
                if (isset($_POST['modif_jeux'])) {
                    echo "<div class = 'action_email'> 
                         <div class = 'action'> 
                            <form method='post'>
                                <input type = 'text' name='jeux_name' placeholder='Nom actuel' required><br/>
                                <input type='submit' name='selection_modif_jeux' if='selection_jeux'> 
                            </form>
                         </div>
                        </div>";
                }

                // Affichage du formulaire de modification
                if (isset($_POST['selection_modif_jeux'])) {
                    extract($_POST);
                    if (!empty($jeux_name)) {

                        // On récupère les données des items ayant le nom rentré par l'utilisateur 
                        $sql = $db->prepare("SELECT * FROM jeux WHERE nom = :name");
                        $sql->execute(
                                [
                                    'name' => $jeux_name
                        ]);
                        $jeux_cible = $sql->fetchAll(\PDO::FETCH_ASSOC);

                        for ($i = 0; $i < sizeof($jeux_cible); $i++) {

                            // Aficchage des anciennes données
                            echo "<div class = 'ancienne donne'> 
                                Nom actuel : " . $jeux_cible[$i]["nom"] . "<br/> Lien actuel : " . $jeux_cible[$i]['id_image'] . "
                                </div>";
                        }

                        // Nouveau form
                        echo "<div class = 'action_email'> 
                                <div class = 'action'> 
                                   <form method='post'>
                                       <input type = 'text' name='jeux_name' placeholder='Nouveau nom du jeux' required><br/>
                                       <input type = 'text' name='jeux_img' placeholder='Nouveau Lien image' required><br/>
                                       <input type='submit' name='form_jeux_modif' if='form_modif'> 
                                   </form>
                                </div>
                               </div>";
                    }
                }

                // Modification des données MODIF
                if (isset($_POST['form_jeux_modif'])) {
                    extract($_POST);
                    if (!empty($jeux_name)) {

                        // On récupère les données des items ayant le nom rentré par l'utilisateur 
                        $sql = $db->prepare("SELECT * FROM jeux WHERE nom = :name");
                        $sql->execute(
                                [
                                    'name' => $jeux_name
                        ]);
                        $jeux_cible = $sql->fetchAll(\PDO::FETCH_ASSOC);

                        for ($i = 0; $i < sizeof($jeux_cible); $i++) {
                            $q = $db->prepare("UPDATE jeux set nom = :new_name WHERE nom = :old_name");
                            $q->execute([
                                'old_name' => $jeux_cible[$i]["nom"],
                                'new_name' => $jeux_name,
                            ]);

                            $q = $db->prepare("UPDATE jeux set id_image = :new_image WHERE nom = :old_image");
                            $q->execute([
                                'old_name' => $jeux_cible[$i]["nom"],
                                'new_image' => $jeux_img,
                            ]);

                            echo '<br/> modify worked ';
                        }
                    }
                }

                /* BTN DISPO
                // Affichage du formulaire pour selectionner l'objet à modifier
                if (isset($_POST['dispo_jeux'])) {
                    echo "<div class = 'action_email'> 
                         <div class = 'action'> 
                            <form method='post'>
                                <input type = 'text' name='jeux_name' placeholder='Nom actuel' required><br/>
                                <input type='submit' name='selection_dispo_jeux' if='selection_dispo_jeux'> 
                            </form>
                         </div>
                        </div>";
                }
                
                // Modification des données DISPO
                if (isset($_POST['selection_dispo_jeux'])) {
                    extract($_POST);
                    if (!empty($jeux_name)) {

                        $sql2 = $db->prepare("SELECT * FROM jeux WHERE nom = :name");
                        $sql2->execute(
                            [
                                'name' => $jeux_name
                            ]);
                        $jeux_cible = $sql2->fetchAll(\PDO::FETCH_ASSOC);

                        for ($i = 0; $i < sizeof($jeux_cible); $i++) {

                            if ($jeux_cible[$i]["dispo"] == 0) {
                                $q = $db->prepare("UPDATE jeux set dispo = :new_dispo WHERE nom = :name");
                                $q->execute([
                                'name' => $jeux_cible[$i]["nom"],
                                'new_dispo' => 1
                                ]);
                                echo $jeux_cible[$i]["nom"]." est maintenant disponible !";
                            }
                            else {
                                $q = $db->prepare("UPDATE jeux set dispo = :new_dispo WHERE nom = :name");
                                $q->execute([
                                'name' => $jeux_cible[$i]["nom"],
                                'new_dispo' => 0
                                ]);
                                echo $jeux_cible[$i]["nom"]." n'est plus disponible disponible.";
                            }
                              
                        }
                    }
                }   */

                
                // BTN SUPRIMER
                // Affichage du formulaire pour selectionner l'objet à modifier
                if (isset($_POST['supr_jeux'])) {
                    echo "<div class = 'action_email'> 
                         <div class = 'action'> 
                            <form method='post'>
                                <input type = 'text' name='jeux_name' placeholder='Nom actuel' required><br/>
                                <input type='submit' name='selection_supr_jeux' if='selection_dispo_jeux'> 
                            </form>
                         </div>
                        </div>";
                }
                
                // Modification des données SUPR
                if (isset($_POST['selection_supr_jeux'])) {
                    extract($_POST);
                    if (!empty($jeux_name)) {
                        $sql2 = $db->prepare("DELETE FROM jeux WHERE nom = :name");
                        $sql2->execute(
                            [
                                'name' => $jeux_name
                            ]);
                        echo $jeux_name." a été suprimer.";
       
                    }
                }
                
                ?>    
    
    <!-- Ajout des boutons JEUX HTML -->
    <div class = "ajout_jeux" id='inline'>
        <form method='post'> <!-- Ajout du bouton (il doit etre dans un form) -->
            <input class = "" name="ajout_jeux" type ="submit" value = Ajouter id='btn_modif'>
        </form>
    </div>

    <div class = "modif_jeux" id='inline'>
        <form method='post'> 
            <input class = "" name="modif_jeux" type ="submit" value = Modifier id='btn_modif'>
        </form>
    </div>

    <div class = "dispo_jeux" id='inline'>
        <form method='post'> 
            <input class = "" name="dispo_jeux" type ="submit" value = "Disponibilité" id='btn_modif'>
        </form>
    </div>

    <div class = "supr_jeux" id='inline'>
        <form method='post'> 
            <input class = "" name="supr_jeux" type ="submit" value = Supprimer id='btn_modif'>
        </form>
    </div><!-- comment -->

    <p>
    <div class="item_jeux">
        <?php
        for ($i = 0; $i < sizeof($jeux); $i++) {
            echo "<ul class='jeux_list'>"
            . "<img src ='" . $jeux[$i]['id_image'] . "' width='15%' id='prout'>" . ""
            . "<div class='nom' id='prout'>" . $jeux[$i]["nom"] . "</div>"
            . "<div class='bloc_nombre' id='prout'><div class='bloc_nombre_item'>Inventaire : " . $jeux[$i]["nombre"] . "</div>"
            . "<div class='bloc_nombre_item'>Réservés : " . $jeux[$i]["nombre_reserves"] . "</div></div>"
            . "<div class='description'><u>Description:</u> " . $jeux[$i]["description"] . "</div></ul>";
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

</body>
