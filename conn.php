<?php
//Connect to databse
$conn = mysqli_connect('localhost','general','root','taverne_bdj');

//if connection=false
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

//Creation variables snack
//Make query and get resuklt
$rsnacks = mysqli_query($conn, 'SELECT * FROM snacks');
//Fetch the resulting row in an array
$snacks = mysqli_fetch_all($rsnacks, MYSQLI_ASSOC);
$nb_snacks = count($snacks);

//Creation variables jeux
//Make query and get resuklt
$rjeux = mysqli_query($conn, 'SELECT * FROM jeux');
//Fetch the resulting row in an array
$jeux = mysqli_fetch_all($rjeux, MYSQLI_ASSOC);
$nb_jeux = count($jeux);


?>