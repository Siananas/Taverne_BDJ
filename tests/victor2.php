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
        <input type = "text" name="snack_name" placeholder="Nom du snack" required><br/>
        <input type = "text" name="new_name" placeholder="Nouveau nom" required>
        <input type="submit" name="formsend" value="formsend"/>
    </form>

    <?php
        if (isset($POST['formsend'])){
            print_r($_POST);
            extract($_POST);

            if (!empty($snack_name) && !empty($new_name)){
                
                echo $snack_name . '<br/>' . $new_name;
                
                

                $q = $db -> prepare("UPDATE snacks set nom = :new_name WHERE nom = :old_name");
                $q -> execute([
                        'old_name' => $snack_name,
                        'new_name' => $new_name
                ]);
                echo '<br/> modify worked ';
            }
        }
    ?>

    <body>
</html>
