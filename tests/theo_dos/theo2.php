

<html>
    
    <?php
        
    // DATA 
        //Connect to databse
        include '/conn.php';

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
    
    
    <head> <!-- https://fr.wikipedia.org/wiki/Raclette -->
        <meta charset="UTF-8"> <!-- encodage pour les accent etc... -->
        <!--<link rel="stylesheet" href="style"/>-->
        <title>Test de Théo ;) </title>
        <link rel="stylesheet" href="style_theo_2.css"/>
    </head>

    <body> <!-- corp -->
        
        <h1 class="Titre">TavernBDJ</h1> <!-- en tête -->
       <nav class = "liste" >
            <ul> 
            <?php echo $snacks[1]["nom"]   ?>
            <ul>
        <nav>

            
    </body>
</html>

