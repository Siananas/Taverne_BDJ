
<html>
    <head>
        <style>
            nav.menu-nav ul{
                width: 100%;
                margin: 15px;
            }

            nav.menu-nav ul li.btn{
                display: inline-block;
                list-style-type: none;
                position : center;
                width: 30%;
            }

            nav.menu-nav ul li.btn a{
                color: white;
                text-decoration: none;
                padding : 10px;
                position : center;
                border-radius: 100px;
                border: 4px double #cccccc;
                font-size : 40px;
                text-align: center;
                width: 100%;
            }
            
            nav.menu-nav ul li.btn:hover a{
                color: black;
                transition:0.5s all;
                background-color: #FFAC58 ;
            }

        </style> <!-- styles -->
    </head>

    <body> 
            <nav class="menu-nav"> <!--création d'un menu navigation-->
                <ul> <!--//Stocker les differentes puces dans une balise-->
                    <li class="btn"> <!--//création d'un nouvelle puce-->
                        <a class = "snack" 
                           href=
                           <?php
                                $to = 'theo.verceil@epfedu.fr';
                                $subject="Test";
                                $message="Bisouuuuuuuuuus"; 
                                $from = 'amelie.roge@epfedu.fr  ';

                                mail($to, $subject, $message);
                           ?>> <!--//relie a un lien-->
                            
                        </a>
                    </li>
                </ul>
            </nav>
    </body>
</html>
