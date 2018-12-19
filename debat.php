<?php 
    session_start();
    setcookie("COOKIE","id", session_set_cookie_params(0));
    $bdd = new PDO ('mysql:host=localhost;dbname=munaziraMembre', 'root', 'root'); 
?>
<html>

<head>

    <meta HTTP-equiv="Content-type" content=text/html; charset=utf-8 />


    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Munazira.css" />
    <title> Munazira </title>

</head>

<body>

   <?php include("vue/vueProfil.php"); ?>
     <br /> <br /> <br />
<h1>SPORT : <a href="roompsport.php">ROOMSPORT</a></h1>
    <br /> <br /> <br />
<h1>Politique : <a href="roompolitique.php">ROOMPOLITIQUE</a></h1>
    
</body>