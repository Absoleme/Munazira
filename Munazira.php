<?php
session_start();
	if ((!isset($_SESSION['pseudo'])))
	{
		// la variable 'login' de session est non déclaré ou vide
		header('Location: connexion.php');
		exit();
	?>
<html>

<head>

    <meta HTTP-equiv="Content-type" content=text/html; charset=utf-8 />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Munazira.css" />
    <title> Munazira </title>


</head>

<body>

    <ul>
        <li> <a href="#">Top commentaire</a>
            <ul>
                <li><a href="#">Gold comments</a></li>
                <li><a href="#">Silver comments</a></li>
                <li><a href="#">Bronze comments</a></li>
            </ul>
        </li>
        <li> <a href="#">Débat</a>
            <ul>
                <li> <a href="#">Sport</a> </li>
                <li> <a href="#">Jeux</a> </li>
                <li> <a href="#">Culture Générale</a> </li>
                <li> <a href="#">Musique</a> </li>
                <li> <a href="#">Politique</a> </li>
                <li> <a href="#">Ecole</a></li>
            </ul>
        </li>
        <li> <a href="#">Profil</a>
            <ul>
                <li><a href="#">Messagerie</a></li>
                <li><a href="#">Déconnection</a></li>
            </ul>
        </li>
        <li> <a href="#"><i class="fa fa-search"></i></a></li>
    </ul>
    <p><font color="fuchsia">hey</font></p>
</body>
</html>
<!--

<body>
    <header> Munazira </header>

    <p> Choisissez un <strong>thème</strong> pour débattre avec le monde ! <br /> </p>
    <nav>
        <ul>
            <li><a href="Sport.html"> Sport </a></li>
            <li><a href="Jeux.html"> Jeux Vidéo </a></li>
            <li><a href="Politique.html"> Politique </a></li>
            <li><a href="cultureGenerale.html"> Culture générale </a></li>

        </ul>
    </nav>

    <footer> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />Créer par Le groupe de projet Munazira
    </footer>
    <!--
    <script>
        var nombreEntre = new Array(8);
        var perso = parseInt(prompt("Veuillez entrer votre pseudo"));



        var Profil = {
            init: function(pseudo) {
                this.pseudo = pseudo;
                this.score = 0;
            }
        }

        var equipe = new Array(2);



        for (perso = 0; perso <= 8; perso++) {
            var Utilisateur = Object.create(Profil);
            nombreEntre[perso] = Utilisateur.init(perso);
        }
    </script> 
</body> 


</html>-->