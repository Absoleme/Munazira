<html>
<head>
    <meta charset="utf-8">
    <title> Munazira </title>
    <link rel="stylesheet" href="css/Accueil.css">
</head>
<body>
    
<?php
    
    $bdd = new PDO ('mysql:host=localhost;dbname=munaziraMembre', 'root', 'root'); // connexion à la base de données 
    
    if(isset($_POST['formconnection']))
    {
     $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']); // converti des charactères spéciaux (prédéfinis) en charactères char
     $mdpconnect= sha1($_POST['mdpconnect']); // permet de faire le hashage du mot de passe
    if(!empty($pseudoconnect) and !empty($mdpconnect))
    {
        $requser = $bdd -> prepare("SELECT * FROM membre WHERE pseudo = ? and motdepasse = ?"); // Préparation de la requête 
        $requser->execute(array($pseudoconnect,$mdpconnect)); // execution de la requête où je vais chercher si le pseudo et le mdp existe dans ma base de données
        $userexist = $requser->rowCount();  
        if($userexist == 1) // si le compte existe dans ma base de donnée
        {
            session_start(); // activation de la session
            setcookie("COOKIE","id", session_set_cookie_params(0)); // parametrage d'un cookie qui va se détruire à la déconnexion et stock l'id
            $question_alea = rand(1,2); // à chaque connexion un nombre aléatoire est généré afin de trouver une question aléatoire pour chaque connexion 
            $userinfo = $requser -> fetch(); 
            $_SESSION['id'] = $userinfo['id']; 
            $_SESSION['pseudo'] = $userinfo['pseudo']; // Variable de session que je vais pouvoir réutiliser 
            $_SESSION['question'] = $question_alea;
            header("Location:profil.php?id=". $_SESSION['id']); // redirection vers le profil personnalisé
        }
        else
        {echo "Mauvais pseudo ou mot de passe";}
    }
        else
            echo "Tout les champs doivent être complétés !";
    }
    
    
    
    include("vue/vueConnexion.php");
?>
</body>
</html>

