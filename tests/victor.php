<!DOCTYPE html>
<html>
    <head>
         <meta charset="UTF-8">
         <title>title</title>
             <link rel="stylesheet" href="style_anais2.css"/>

    </head>
    <body>

    <form method="post">
        <input type = "text" name="snack_name" placeholder="Non du snack" required><br/>
        <input type = "text" name="snack_img" placeholder="lien image" required>
        <input type="submit" name="formsend" if="formsend">
    </form>

    <?php
    //On se connecte a la bdd
    include '../database.php';
    global $db;
    
    $q = $db -> query("SELECT * FROM snacks");
    while ($snacks = $q -> fetch()) {
        ?>
        <li>
            <a href="profil.php?q = " <?= $snacks['nom'];?>>
                
            </a>
        </li>

    <?php
    }
    
    ?>

    <body>


</html>