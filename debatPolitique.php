<?php 
 session_start();
 setcookie("COOKIE","id", session_set_cookie_params(0));
 $bdd = new PDO ('mysql:host=localhost;dbname=munaziraMembre', 'root', 'root'); 
 if(isset($_POST['pseudo']) and isset($_POST['message']) and !empty($_POST['pseudo']) and !empty($_POST['message']))
    {
        $pseudo = htmlspecialchars($_POST['pseudo']); // empêche l'utilisateur d'écrire avec des balises html ou php -> sécurité du champs
        $message = htmlspecialchars($_POST['message']);
        $insertmsg = $bdd -> prepare('INSERT INTO chat(pseudo,message) VALUES(?,?)');
        $insertmsg -> execute(array($pseudo,$message));
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
       
        $question_alea = rand(1,2); 
        $req_question = $bdd -> prepare('SELECT * FROM questionPolitique WHERE id = ?');
        $req_question -> execute(array($question_alea));
        $info_quest = $req_question -> fetch();
        
    echo ($info_quest['question']); ?>
        <?php //echo'debug1'; print_r($question_info);echo'debug1'; ?>
    
    <?php include("vue/vueDebat.php"); ?>

    <div id="message">
        <?php 
    $allmsg = $bdd -> query('SELECT * FROM chat ORDER BY id DESC LIMIT 0,6'); // Pour afficher les messages les plus récent en premier dans la limite de 6 messages
    while($msg = $allmsg -> fetch())
    {
    ?>
        <b>
            <?php echo $msg['pseudo']; ?> : </b> <b>
            <?php echo $msg['message']; ?> </b> <br />
        <?php 
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
