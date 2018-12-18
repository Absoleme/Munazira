<?php 
$bdd = new PDO ('mysql:host=localhost;dbname=munaziraMembre', 'root', 'root'); 
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
