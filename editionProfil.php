<?php 
    session_start();
    setcookie("COOKIE","id",session_set_cookie_params(0));
    $bdd = new PDO ('mysql:host=localhost;dbname=munaziraMembre', 'root', 'root');
    
    if(isset($_SESSION['id'])) // autoriser l'utilisateur à accéder à la page si elle existe dans ma bdd et qu'il est connectée
    {
        $requser = $bdd -> prepare("SELECT * FROM membre WHERE id = ?"); // requête qui permet de sélectionner l'utilisateur dans la base de données
        $requser -> execute(array($_SESSION['id'])); // execution de la requête 
        $user = $requser -> fetch();
        
        if(isset($_POST['nouveauPseudo']) and !empty($_POST['nouveauPseudo']) and $_POST['nouveauPseudo'] != $_user['pseudo'])
        {
            $nouveauPseudo = htmlspecialchars($_POST['nouveauPseudo']); //permet de sécuriser la variable pour éviter des injection sql
            $insertpseudo = $bdd -> prepare("UPDATE membre SET pseudo = ? WHERE id = ?"); // si je ne met pas le WHERE id = ? je vais changer tout les pseudos de tout les utilisateurs
            $insertpseudo -> execute(array($nouveauPseudo, $_SESSION['id']));
            header ('Location: profil.php?id='.$_SESSION['id']."?pseudo=".$_SESSION['pseudo']);
        }
        
        if(isset($_POST['nouveauMail']) and !empty($_POST['nouveauMail']) and $_POST['nouveauMail'] != $_user['mail'])
        {
            $nouveauMail = htmlspecialchars($_POST['nouveauMail']); //permet de sécuriser la variable pour éviter des injection sql
            $insertMail = $bdd -> prepare("UPDATE membre SET mail = ? WHERE id = ?"); // si je ne met pas le WHERE id = ? je vais changer tout les pseudos de tout les utilisateurs
            $insertMail -> execute(array($nouveauMail, $_SESSION['id']));
            header ('Location: profil.php?id=' . $_SESSION['id']);
        }
        
        if(isset($_POST['nouveauMdp1']) and !empty($_POST['nouveauMdp1']) and isset($_POST['nouveauMdp2']) and !empty($_POST['nouveauMdp2']))
        {
            $mdp1 = sha1($_POST['nouveauMdp1']);
            $mdp2 = sha1($_POST['nouveauMdp2']);
            if($mdp1 == $mdp2)
            {
                $insertmdp = $bdd -> prepare("UPDATE membre SET motdepasse = ? WHERE id = ?");
                $insertmdp -> execute(array($mdp1,$_SESSION['id']));
                header ('Location: profil.php?id=' . $_SESSION['id']);
            }
            else
            {
                echo 'Vos deux mots de passe ne correspondent pas !';
            }
        }
        if(isset($_POST['nouveauPseudo']) and $_POST['nouveauPseudo'] == $user['pseudo'] )
        {
             header ('Location: profil.php?id=' . $_SESSION['id']);
        }
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

    <div align="center">
        <div class="banner">
            <div class="banner-content">
                <h1 class="title is-1">
                    <font color="black">Edition de mon profil</font>
                </h1>
                <form method="post" action="">
                    <table>
                        <tr>
                            <td align="right">
                                <label>
                                    <font color="black">Nouveau Pseudo :</font>
                                </label>
                            </td>
                            <td>
                                <input type="text" name="nouveauPseudo" placeholder="Nouveau pseudo"> <br />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label>
                                    <font color="black">Nouveau Mail :</font>
                                </label>
                            </td>
                            <td>
                                <input type="text" name="nouveauMail" placeholder="Nouveau Mail"> <br />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label>
                                    <font color="black">Nouveau mot de passe :</font>
                                </label>
                            </td>
                            <td>
                                <input type="password" name="nouveauMdp1" placeholder="Nouveau mot de passe"> <br />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label>
                                    <font color="black">Confirmation du nouveau mot de passe :</font>
                                </label>
                            </td>
                            <td>
                                <input type="password" name="nouveauMdp2" placeholder="Confirmation du mdp"> <br />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <input type="submit" value="Mettre à jour votre profil" />
                            </td>
                        </tr>

                    </table>

                </form>


            </div>
        </div>
    </div>
</body>

</html>
<?php
    }
else
       {
           header ("Location:connexion.php"); // Sécurité qui permet juste à l'utilisateur connecté d'accéder à l'édition de son profil
       }

?>
