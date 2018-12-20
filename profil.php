 <?php 
    session_start();
    setcookie("COOKIE","id", session_set_cookie_params(0));
    $bdd = new PDO ('mysql:host=localhost;dbname=munaziraMembre', 'root', 'root');
    
    if(isset($_GET['id']) and $_GET['id'] > 0)
    {
        $getid = intval($_GET['id']);// permet de sécuriser la variable
        $requser = $bdd -> prepare("SELECT * FROM membre WHERE id = ?");
        $requser->execute(array($getid));      
        $userinfo = $requser -> fetch();  
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
 <div class="block">
            <div class="banner">
                    <div class="banner-content">
                        <h1 class="title is-1"> <font color="black">Profil de <?php echo $_SESSION['pseudo']; ?></font></h1>
                    <h2 class="subtitle"><font color="black">Découvrez les différents thèmes dans la barre de navigation !</font></h2>   
                </div>
            </div>
</div>
    
</body>
</html>