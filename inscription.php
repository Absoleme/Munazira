<html>

<head>
    <meta charset="utf-8">
    <title> Munazira </title>
    <link rel="stylesheet" href="css/Accueil.css">
</head>

<body>


    <?php
    
    $bdd = new PDO ('mysql:host=localhost;dbname=munaziraMembre', 'root', 'root');
    
    if(isset($_POST['inscription']))
    {
        if(!empty($_POST['pseudo']) and !empty($_POST['mail']) and !empty($_POST['mail2']) and !empty($_POST['mdp']) and !empty($_POST['mdp2']))
        {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $mail = htmlspecialchars($_POST['mail']);
            $mail2 = htmlspecialchars($_POST['mail2']);
            $mdp = sha1($_POST['mdp']);
            $mdp2 = sha1($_POST['mdp2']);
            $QP0 = $_POST['QP0'];
            $QP1 = $_POST['QP1'];
            $QP2 = $_POST['QP2'];
            $QP3 = $_POST['QP3'];
            $QP = $QP0.",".$QP1.",".$QP2.",".$QP3;
            
            
            $pseudolength = strlen($pseudo);
            if($pseudolength <= 255)
            {
                $reqpseudo = $bdd -> prepare('SELECT * FROM membre WHERE pseudo = ?');
                $reqpseudo -> execute(array($pseudo));
                $pseudoexist = $reqpseudo -> rowCount();
                if($pseudoexist == 0)
                {
                     if($mail == $mail2)
                {
                    $reqmail = $bdd->prepare('SELECT * FROM membre WHERE mail = ?');
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail -> rowCount();
                    if($mailexist == 0)
                    {
                         if($mdp == $mdp2)
                    {
                       
                          
                                        session_start();
                                        setcookie("COOKIE","id", session_set_cookie_params(0));   
                                        $insertMembre = $bdd->prepare("INSERT INTO membre(pseudo,mail,motdepasse,avis) VALUES(?,?,?,?)");
                                        $insertMembre->execute(array($pseudo,$mail,$mdp,$QP));
                                        header("Location:connexion.php");
                                       
                       
                    }
                    else
                    {
                        echo "Veuillez saisir le même mot de passe";
                    }
                    }
                    else{echo "Votre mail est déjà existant";}
                        
                   
                }
                else
                {
                    echo "Veuillez saisir le même mail";
                }
                }
                else{echo "Votre pseudo est déjà pris";}
               
            }
            else
            {
                echo "votre pseudo ne doit pas dépasser 255 charactères";
            }
        }
        else
        {
           echo "Remplissez tout les champs";
        }
       
    }
    include("vue/vueInscription.php");
    
    ?>
</body>

</html>
