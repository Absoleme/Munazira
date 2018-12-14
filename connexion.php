<html>
<head>
    <meta charset="utf-8">
    <title> Munazira </title>
    <link rel="stylesheet" href="css/Accueil.css">
</head>
<body>
    
    
<?php
    
    $bdd = new PDO ('mysql:host=localhost;dbname=munaziraMembre', 'root', 'root');
    
    if(isset($_POST['formconnection']))
    {
     $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']); // converti des charactères spéciaux (prédéfinis) en charactères char
     $mdpconnect= sha1($_POST['mdpconnect']); // permet de faire le hashage du mot de passe
    if(!empty($pseudoconnect) and !empty($mdpconnect))
    {
        $requser = $bdd -> prepare("SELECT * FROM membre WHERE pseudo = ? and motdepasse = ?");
        $requser->execute(array($pseudoconnect,$mdpconnect));
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            session_start();
            setcookie("COOKIE","id", session_set_cookie_params(0));
            $userinfo = $requser -> fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
         // $_SESSION['mdp'] = $userinfo['mdp'];
            header("Location:profil.php?id=". $_SESSION['id']);
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

