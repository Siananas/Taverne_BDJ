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

    <form action="action.php" method="post">
    <p>Votre nom : <input type="text" name="nom" /></p>
    <p>Votre âge : <input type="text" name="age" /></p>
    <p><input type="submit" value="OK"></p>
    </form>

    <body>


</html>