<?php

/*cette classe permet d'accerder a la base de données avec différentes méthodes:
connexio, selct, delete, update etc...*/

class Modele_membre
{
    private $pdo //instance de la classe pdo
    
    public function __construct($serveur, $bdd, $user, $mdp)
    {
        $this -> pdo = null;
        try
        {
            $this -> pdo = new PDO("mysql:host=".$serveur.";dbname=".$bdd, $user, $mdp);
        }
        catch(Exception $exp)
        {
            echo "Erreur de connexion à la bdd";
        }
    }
    
    public function connexion($pseudo, $password)
    {
        $requete="select count(*) pseudo, idMembre
        from membre
        where pseudo= :pseudo
        and password = :password
        ;";
        
        $donnees= array('pseudo'=>$pseudo, "password"=>$pseudo);
        if($this -> pdo == null)
        {
            return null;
        } else {
            $select = $this -> pdo -> prepare($requete);
            $select = execute ($donnees);
            $membre = $select -> fetch();
            return $membre;
        }
    }
}

?>