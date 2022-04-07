

<?php
//Connect to databse
$conn = mysqli_connect('localhost','Victor','root','taverne_bdj');

//if connection=false
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}
// Write querry for all users
$sql = 'SELECT * FROM snacks';

//Make query and get resuklt
$result = mysqli_query($conn, $sql);

//Fetch the resulting row in an array
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Print the array
print_r($users);

?>