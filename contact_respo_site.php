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
            .format{
                vertical-align: baseline;
                background-color: #F6F3E4;
                width: max-content;
                padding:3em;
                margin: 20% auto;
                border-style: double;
                border-width: 8px;
            }
            .body {
                padding: 2em;
        </style>
    </head>
    <body class='body'>
        <div class='format'>
            <h1 class="banniere">TavernBDJ</h1>

            <p class="intro">Tu as des commentaires à nous faire ?</p>
            <p>Tu peux nous contacter en remplissant le formulaire ci-dessous :</p>
            <form method="post">
                <p>Nom : </p>
                <input type="text" name="nom" id="nom">
                <p>Prénom : </p>
                <input type="text" name="prenom" id="prenom">
                <p>Mail EPF : </p>
                <input type="text" name="mail" id="mail">
                <p>Message : </p>
                <input type="text" name="message" id="message">
            </form>
        </div>
    </body>
