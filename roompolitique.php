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
    <?php //echo vous êtes actuellement $_SESSION['nbMembre'] en attente dun autre utilisateur avant de commencer le débat;
    if(!empty($_SESSION['id'])) {
        $add_statue = 0;
        $req_ip_exist = $bdd -> prepare('SELECT * FROM room WHERE user_ip = ?'); 
        $req_ip_exist -> execute(array($_SESSION['pseudo']));
        $ip_exist = $req_ip_exist -> rowCount(); // Compter le nombre d'entrer avec cette requête
        
        if($ip_exist == 0)
        {
            $add_statue == $add_statue + 1;
            $add_ip = $bdd -> prepare('INSERT INTO room(user_ip,statue) VALUES(?,?)'); // insertion du pseudo dans la base de donnée
            $add_ip->execute(array( $_SESSION['pseudo'],$add_statue));
        }
        $show_user_nbr = $bdd->query('SELECT * FROM room'); // Montre à l'utilisateur combien de personne il y a dans la room
        $user_nbr = $show_user_nbr -> rowCount();
        echo "Vous êtes actuellement ".$user_nbr." personne dans le loby";
      // $nb_ip = $bdd -> query('SELECT COUNT (*) FROM room');
    if($user_nbr == 2)
    { 
       header("Location:debatPolitique.php");
       $req_ip_del= $bdd -> prepare('TRUNCATE TABLE room' ); // vidage de la table pour permettre à d'autre utilisateur de venir dans la room
       $req_ip_del -> execute();
    }
    }
    
    ?>

</body>
