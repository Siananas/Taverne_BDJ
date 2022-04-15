

<html>
    
    <?php
    // DATA 
        include('../../conn.php');
        ?>
    
    
    <meta charset="UTF-8"> 
    <link rel="stylesheet" href="style_theo_2.css"/>
    
    <header>
        <title>Si tu lis ce message t'es trop beau</title>
        <<p class="En_tete">En-tête</p>
    </header>

    
    <body>
        
       <h1 class="Titre">TavernBDJ</h1>
        
       <ul class="snacks_objet">
            <?php
            for($i=0;$i<sizeof($snacks);$i++){
                echo "<li class='snacks_list'>"
                        . "<img src ='".$snacks[$i]['lien_img']."' width='80px' 'class='img'>". ""
                        . "<div class='snacks_elements' >".$snacks[$i]["nom"].""
                        . "</div class='prix'> prix </li>";
            }
            ?>
        </ul>
        
        <footer>
            <p>
                Copyright &copy; BDJ - 2022-2023 - All Right Reserved 
            </p>

        </footer>
    </body>
    
</html>

