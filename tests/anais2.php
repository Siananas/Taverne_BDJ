<?php
session_start(); // démarrage de la session pour sauvegarder les variable (doit etre la première ligne du code)
?>


 <?php
    $i=0;
    if (!isset($_SESSION['nb'])) $_SESSION['nb'] = $i.'test';
    
    echo $i.='test';

    $test='test';
    
    
    ?>
    <form method="post"> <!-- BONTON TEST html (il doit etre dans un form) -->
        <input class = "" name=$test type ="submit" value = "Test" >
    </form>


    <?php
    if (isset($_POST[$test])) { // Si Lecture du bouton ...
        echo "message";
    }
    ?>
