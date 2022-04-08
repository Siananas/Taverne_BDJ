

<?php
//Connect to databse
include '../conn.php';

// Write querry for all users
$sql = 'SELECT * FROM snacks';

//Make query and get resuklt
$result = mysqli_query($conn, $sql);
//Fetch the resulting row in an array
$snacks = mysqli_fetch_all($result, MYSQLI_ASSOC);
print_r($snacks[1]["nom"]);

//Print the array
print_r($snacks);
?>
