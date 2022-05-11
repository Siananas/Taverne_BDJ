<!DOCTYPE html>
<html>
    <head>
         <meta charset="UTF-8">
         <title>title</title>
             <link rel="stylesheet" href="style_anais2.css"/>

    </head>
    <body>

    <?php

    /*On se connecte a la bdd
    !!! Etape Nécessaire à TOUTES les pages ou on a besoins d'utiliser la BDD*/
    include '../database.php';
    global $db;


    $sql = $db -> prepare("SELECT * FROM snacks");
    $sql -> execute();
    $snacks = $sql->fetchAll(\PDO::FETCH_ASSOC);
   






    /*
    Form pour rajouter un snack. pour le Snack, on a besoins du nom et de l'image.
    l'id et la dispo sont definis par defaut (la dispo est a 0 de base. elle passe a 1 si il y a du stock)
    */
    ?>
    <form method="post">
        <input type = "text" name="snack_name" placeholder="Non du snack" required><br/>
        <input type = "text" name="snack_img" placeholder="Lien image" required><br/>
        <input type = "float" name="snack_prix" placeholder="Prix" required>
        <input type="submit" name="formsend" if="formsend">
    </form>

    <?php

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
                $q = $db -> prepare("INSERT INTO snacks(nom, lien_img, prix)  VALUES(:nom, :img, :prix)");
                //On execute la requette en attribuant aux variables 'nom' et 'img' les variables du Form
                $q -> execute([
                    'nom' => $snack_name,
                    'img' => $snack_img,
                    'prix' => $snack_img
                ]); 
            }
        }
    ?>

    <body>
</html>
