<!doctype html>
<html>
    
    <head> 
        
        <style> 
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #333;
                position : fixed;
                width: 100%;
            }

            li {
                float: right;
            }

            li a, .dropbtn {
                display: inline-block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            li a:hover, .dropdown:hover .dropbtn {
                background-color: #FFAB00;
            }

            li.dropdown {
                display: inline-block;
                text-align: left;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            }

            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                text-align: left;
            }
            
            h1.banniere {
                color: white;
                text-align: center;
            }
            
            p.faire_du_vide {
                color : white;
            }

            .dropdown-content a:hover {background-color: #f1f1f1}

            .show {display:block;}
        </style>
    </head> 
         
    <body>
        
        <ul>
          <h1 class = "banniere">TaverneBDJ</h1>
          <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn" onclick="myFunction()"><img src="Image_test/Tibou.jpg"></a>
            <div class="dropdown-content" id="myDropdown">
              <a href="#">Connection administrateur</a>
              <a href="#">Mentions légales</a>
              <a href="#">Nous contacter</a>
            </div>
          </li>
        </ul>

      
    
        <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(e) {
          if (!e.target.matches('.dropbtn')) {

            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var d = 0; d < dropdowns.length; d++) {
              var openDropdown = dropdowns[d];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
            }
          }
        }
        </script>
        <!--<p class = "faire_du_vide">.</p>
        <p class = "faire_du_vide">.</p>
        <p class = "faire_du_vide">.</p>
        <p class = "faire_du_vide">.</p>
        <p class = "faire_du_vide">.</p>
        <p class = "faire_du_vide">.</p>-->
        
        <img src="Image_test/le_saucisson.jpg"> 
        <img src="Image_test/le_saucisson.jpg">
        <img src="Image_test/le_saucisson.jpg">
    </body>
    
</html>
