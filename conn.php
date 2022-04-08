<?php
//Connect to databse
$conn = mysqli_connect('localhost','general','root','taverne_bdj');

//if connection=false
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}
?>