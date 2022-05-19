<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>TaverneBDJ</title>
        <link rel="stylesheet" href="styles.css"/>


        <style>
            .body {
                padding: 2em;
            }

            a.valider {
                background-color: greenyellow ;
            }

            a.retour {
                background-color: red ;
            }
        </style>
    </head>
    <body class='body'>
        <h1 class="banniere">Es-tu sûr(e) de vouloir contacter un vendeur ?</h1>
        
        <div class ="intro">
            <nav class="menu-nav"> 
                <ul> <!--//Stocker les differentes puces dans une balise-->
                    <li class="btn"> <!--//création d'un nouvelle puce-->
                        <a class="valider" href="#" target="_BLANK"> 
                            Valider
                        </a>
                    </li>
                    <li class="btn">
                        <a class = "retour" href="vue_generale.php" target="_BLANK"> 
                            Retour sur la page principale
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </body>

    <footer>PS. Si quelqu'un a appelé un vendeur il y a moins de 5 minutes, tu ne peux pas appeler.</footer>