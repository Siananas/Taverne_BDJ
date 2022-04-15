<!DOCTYPE html>
<html>
    <head>
         <meta charset="UTF-8">
         <title>title</title>
             <link rel="stylesheet" href="style_anais2.css"/>

    </head>
    <body>

    

    <?php
    //On se connecte a la bdd, et on recupere les differentes variables
    include '../conn.php';
    ?>

    <form action="victor.php" method="post">
    <p>nouveau nom du snack : <input type="text" name="nom" /></p>
    <p>lien img : <input type="text" name="lien" /></p>
    <p><input type="submit" value="OK"></p>
    </form>

    <?php
    $new_name = $_POST['nom'];
    $new_lien = $_POST['lien'];
    $sql = "INSERT INTO `Snacks`(`nom`, `lien_img`, `dispo`) VALUES ('".$new_name."','".$new_lien."','0')";
    echo $sql
    
    ?>
    

    <body>


</html>