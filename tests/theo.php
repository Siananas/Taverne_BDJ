

<html>
    <head> <!-- https://fr.wikipedia.org/wiki/Raclette -->
        <meta charset="UTF-8"> <!-- encodage pour les accent etc... -->
        <!--<link rel="stylesheet" href="style"/>-->
        <title>Test de Théo ;) </title>
        <link rel="stylesheet" href="style_theo.css"/>
    </head>

    <body> <!-- corp -->
        
        <h1 class="Titre">TavernBDJ</h1> <!-- en tête -->
        <nav class = "menu-nav" > <!--création d'un menu navigation-->
            <ul> <!--//Stocker les differentes puces dans une balise-->
                <li class="btn" >  <!--//création d'un nouvelle puce-->
                     <a href=https://fr.wikipedia.org/wiki/Raclette target="_BLANK">
                      <!--//relie a un lien, Blank  = ouverture nvl page-->
                      Connexion admin</a></li> 
                <li class="btn" ><a href=../tests/theo.php>
                      Refresh</a></li>
            <ul>
        <nav>
       
           <!-- <img class ="saucisson" src="Image_test/le_saucisson"> ajout image -->    
         
            <div class="video" id="blockvideo"> 
                
                <div id="video"> <iframe width="560" height="315" src="https://www.youtube.com/embed/scBVfB2RFf8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>   
            
        <p class="Texte"> Wesh ici c'est chez Théo </p>
        <form action="verif.php" METHOD="GET">
            Saisissez Login : <input name="LeLogin"> <BR/>
            Saisissez MDP : <input name="LeMDP"> <BR/>
            
            <button type="summit">Cliquez ici</button>
        </form>
        <?php
        
        ?>
    </body>
</html>

