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
