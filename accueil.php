<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->

<?php
//Connect to databse
$conn = mysqli_connect('localhost','root'.'root','test1');

//if connection=false
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}


?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>TaverneBDJ</title>
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
        <?php
        
        ?>
    </body>
