<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->




<html>
    <head>
        <meta charset="UTF-8">
        <title>TaverneBDJ</title>
            <link rel="stylesheet" href="style.css"/>
         <style>
        .Parableu {
        color: blue;
        }
    </style>
    </head>
   
    <body>
        <h1>TavernBDJ</h1>
        <p class="Parableu"> Introduction </p>
        
        <!-- écrire ici les conditions d'utilisation et les valeurs générales du site --> 
        
            <form action="verif.php" METHOD="GET">
            Saisissez Login : <input name="LeLogin"> <BR/>
            Saisissez MDP : <input name="LeMDP"> <BR/>
            
            <button type="summit">Cliquez ici</button>
        </form>
        
        <!-- 3 BOUTONS -->
         <nav class="menu-nav"> <!--création d'un menu navigation-->
             <ul> <!--//Stocker les differentes puces dans une balise-->
                 <li class="btn"> <!--//création d'un nouvelle puce-->
                     <a href=../accueil.php> <!--//relie a un lien-->
                         Matos
                     </a>
                 </li>
                 <li class="btn">
                     <a href="https://fr.wikipedia.org/wiki/Raclette" target="_BLANK"> 
                         Snack
                     </a>
                 </li>
                 <li class="btn">
                     <a href="https://fr.wikipedia.org/wiki/Raclette" target="_BLANK"> 
                         Jeux
                     </a>
                 </li>
             </ul>
         </nav>
        
        
        <?php
        
        ?>
    </body>
