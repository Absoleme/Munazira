<ul>
        <li> <a href="#">Top commentaire</a>
            <ul>
                <li><a href="#">Gold comments</a></li>
                <li><a href="#">Silver comments</a></li>
                <li><a href="#">Bronze comments</a></li>
            </ul>
        </li>
        <li> <a href="debat.php">Débat</a>
        <!--<li><!-- <img src="css/LogoMunazira.png"> 
           <!-- <ul>
                <li> <a href="#">Sport</a> </li>
                <li> <a href="#">Jeux</a> </li>
                <li> <a href="#">Politique</a> </li>
                
            </ul>-->
        </li>
        <li>
           <?php        
            if(!empty($_SESSION['id'])){ // Si l'utilisateur n'est pas connecté il ne pourra pas voir l'onglet profil / messagerie / deconnexion
               // if(isset($_COOKIE['id']) and $userinfo['id'] == $_COOKIE['id']){
                    echo "<a href=\"profil.php\">Profil</a> ";
            echo "<ul>";
                echo "<li><a href=\"editionProfil.php\">Edition</a></li>";
                echo "<li><a href=\"#\">Messagerie</a></li>";
                echo "<li><a href=\"deconnexion.php\">Déconnection</a></li>";
            echo"</ul>";
               // }
            
            }
         ?>
            
            
        </li>
        <li> <a href="#"><i class="fa fa-search"></i></a></li>
</ul>


