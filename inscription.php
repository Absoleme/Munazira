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
      //      $QP  = array($QP0,$QP1,$QP2,$QP3);
        //    $serialized = serialize($QP);
    //        var_dump($serialized);
            
           //var_dump(explode(',',$QP));
            
            
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
                       /* if($QP0 == 0 or $QP0 == 1)
                        {
                            if($QP1 == 0 or $QP1 == 1)
                            {
                                if($QP2 == 0 or $QP2 == 1)
                                {
                                    if($QP3 == 0 or $QP3 == 1)
                                    {*/
                          
                                        session_start();
                                        setcookie("COOKIE","id", session_set_cookie_params(0));   
                                        $insertMembre = $bdd->prepare("INSERT INTO membre(pseudo,mail,motdepasse,avis) VALUES(?,?,?,?)");
                                        $insertMembre->execute(array($pseudo,$mail,$mdp,$QP));
                                        header("Location:connexion.php");
                                        //echo "votre compte a bien été créé";
                                  /*  }
                                }
                               
                            }
                             
                        }
                             else 
                             {
                                 echo " Veuillez repondre à la question 1 svp";
                             }*/
                       
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










<!--
$pseudo = 'pseudo_libre';
try
{
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=localhost;dbname=munaziraMembre', 'root', 'root');

$reponse = $bdd->query('SELECT pseudo, mdp FROM membre WHERE pseudo='.$pseudo);

if ($donnees = $reponse->fetch())
{
echo 'Il y a déjà une personne qui utilise '.$pseudo .' comme pseudo !<br />';
}
$reponse->closeCursor();
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}

try
{
$bdd = new PDO('mysql:host=localhost;dbname=munaziraMembre','root','root');

$requete = $bdd->query('SELECT pseudo, mdp FROM membre WHERE mdp='.$mdp);

if(isset($_POST['mdp'] != $POST['remdp'])
{
echo '<p>' . Veuillez saisir le même mot de passe . '</p>';
}

}

$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT); // hashage du mdp

// Insertion dans la base de données
$req = $bdd->prepare('INSERT INTO membre(pseudo, mdp) VALUES(:pseudo, :mdp)');
$req->execute(array(
'pseudo' => $pseudo,
'mdp' => $pass_hache,));
?>
-->
