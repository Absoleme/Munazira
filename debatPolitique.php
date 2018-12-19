<?php 
 session_start();
 setcookie("COOKIE","id", session_set_cookie_params(0));
 $bdd = new PDO ('mysql:host=localhost;dbname=munaziraMembre', 'root', 'root'); 
 if(isset($_SESSION['pseudo']) and isset($_POST['message']) and !empty($_SESSION['pseudo']) and !empty($_POST['message']))
    {
        $pseudo = htmlspecialchars($_SESSION['pseudo']); // empêche l'utilisateur d'écrire avec des balises html ou php -> sécurité du champs
        $message = htmlspecialchars($_POST['message']);
        $insertmsg = $bdd -> prepare('INSERT INTO chat'.$_SESSION['question'].'(pseudo,message) VALUES(?,?)');
        $insertmsg -> execute(array($_SESSION['pseudo'],$message));
    }
?>
<html>

<head>

    <meta HTTP-equiv="Content-type" content=text/html; charset=utf-8 />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--Bibliothèque jquery (framework de javascript-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Munazira.css" />
    <title> Munazira </title>

</head>

<body>
    <?php include("vue/vueProfil.php"); ?>
    <br/> <br /> <br /> <br /> 
    
        <?php  
             // SELECTION DE LA QUESTION POSÉE À L'UTILISATEUR //
       
         
        $req_question = $bdd -> prepare('SELECT * FROM questionPolitique WHERE id = ?');
        $req_question -> execute(array($_SESSION['question']));
        $info_quest = $req_question -> fetch();
        
    echo ($info_quest['question']); ?>
        <?php //echo'debug1'; print_r($question_info);echo'debug1'; ?>
    
    <?php include("vue/vueDebat.php"); ?>

    <div id="message">
        <?php 
    $allmsg = $bdd -> query('SELECT * FROM chat'.$_SESSION['question'].' ORDER BY id DESC LIMIT 0,6'); // Pour afficher les messages les plus récent en premier dans la limite de 6 messages
    /* Effacement de toutes les lignes de la table FRUIT */
$del = $bdd->prepare('SELECT id FROM chat'.$_SESSION['question']);
$del->execute();

/* Retourne le nombre de lignes effacées */

$count = $del->rowCount();

        
        
    while($msg = $allmsg -> fetch())
    {
    ?>
        <b>
            <?php echo $_SESSION['pseudo']; ?> : </b> <b>
        <?php echo $msg['message']; ?> </b> <br />
        
        <?php 
        if($count > '3')
        {
            header ('Location:profil.php');
        }
    }
    ?>
    </div>
    <script>
        setInterval('load_messages()', 500); // J'actualise toute les 500 milisecondes le chat afin que les utilisateurs puisse voir en temps réel les messages mis en lignes 
        function load_messages() {
            $('#message').load('load_messages.php');
        }

    </script>

</body>

</html>
