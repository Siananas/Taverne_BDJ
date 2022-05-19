<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>TaverneBDJ</title>


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



            nav.menu-nav ul{
                width: 100%;
                margin: 15px;
                text-align: center;
                padding : 0;
            }

            nav.menu-nav ul li.btn{
                display: inline-block;
                list-style-type: none;
                width: 45%;
            }

            nav.menu-nav ul li.btn a{
                color: white;
                text-decoration: none;
                padding : 10px;
                border-radius: 100px;
                border: 4px double #cccccc;
                font-size : 2vw;
                text-align: center;
                width: 100%;
            }

            nav.menu-nav ul li.btn:hover a{
                color: black;
                transition:0.5s all;
                background-color: #FAF5DE
            }

            footer{
                background-color: black;
                color: white;
                padding: 30 px;
                font-size : 1vw;
            }

        </style>
    </head>
    <body class='body'>
        <h1 class="banniere">Es-tu sûr(e) de vouloir contacter un vendeur ?</h1>
        <br><br><br>
        
        <div class ="intro">
            <nav class="menu-nav"> 
                <ul> <!--//Stocker les differentes puces dans une balise-->
                    <li class="btn"> <!--//création d'un nouvelle puce-->
                        <a class="valider"> 
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
    <br><br><br><br>
    <footer>PS. Si quelqu'un a appelé un vendeur il y a moins de 5 minutes, tu ne peux pas appeler.</footer>