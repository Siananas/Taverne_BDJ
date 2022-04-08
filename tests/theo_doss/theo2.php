

<html>
    
    <?php
        
    // DATA 
        //Connect to databse
        include('../../conn.php');
        $i = 0;
         
        
       function show_tableau($tab){
         foreach ($tab as $val) {
             if (is_array($val)) {
                show_tableau($val);
              } else {
                echo $val . '<br />';
              } 
            } 
           } 
        ?>
    
    
    <head> <!-- https://fr.wikipedia.org/wiki/Raclette -->
        <meta charset="UTF-8"> 
        
        <title>Test2 </title>
        <link rel="stylesheet" href="style_theo_2.css"/>
    </head>

    <body>
        
        <h1 class="Titre">TavernBDJ</h1> <!-- en tête -->
       <nav class = "liste" >
            <ul> 
                <li>
                    <?php
                     
                        show_tableau($snacks);      

                ?>
                
                </li>
                
            <ul>
        <nav>
        
    </body>
    
</html>

