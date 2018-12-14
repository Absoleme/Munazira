<div align="center">
    <h2>Inscription</h2>
    <br /> <br />
    <form method="post" action="">
        <table>
            <tr>
                <td align="right">
                    <label for="pseudo">Pseudo : </label>
                </td>
                <td>
                    <input id="pseudo" type="texte" placeholder="votre pseudo" name="pseudo">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="mail">Mail : </label>
                </td>
                <td>
                    <input id="mail" type="email" placeholder="votre mail" name="mail">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="mail2">Confirmation du mail : </label>
                </td>
                <td>
                    <input id="mail2" type="email" placeholder="Confirmer votre adresse mail" name="mail2">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="mdp">Mot de passe : </label>
                </td>
                <td>
                    <input id="mdp" type="password" placeholder="Votre mot de passe" name="mdp">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="mdp2">Confirmation du mot de passe : </label>
                </td>
                <td>
                    <input id="mdp2" type="password" placeholder="Confirmer votre mdp" name="mdp2">
                </td>
            </tr>
           <tr>
            <td align="right">
                <label for="QP0"> USA VS CHINE :</label>    
            </td> 
                <td>
                <input type="radio" id="QP0" name="QP0" value="0" /> <label for="Gauche">USA</label>          
                <input type="radio" id="QP0" name="QP0" value="1" /> <label for="Droite">CHINE</label>
                </td>         
            </tr>
            <tr> 
            <td align="right">
                <label for="QP1"> Pour ou contre La légalisation du cannabis:</label>    
            </td> 
                <td>
                <input type="radio" id="QP1" name="QP1" value="0" /> <label for="Gauche">Pour</label>          
                <input type="radio" id="QP1" name="QP1" value="1" /> <label for="Droite">Contre</label>
                </td>         
            </tr>
            <tr> 
            <td align="right">
                <label for="QP2"> Coupe du monde VS ligue des champions ?:</label>    
            </td> 
                <td>
                <input type="radio" id="QP2" name="QP2" value="0" /> <label for="Gauche">Coupe du monde</label>          
                <input type="radio" id="QP2" name="QP2" value="1" /> <label for="Droite">Ligue des champions</label>
                </td>         
            </tr>
            <tr> 
            <td align="right">
                <label for="QP3"> Cristiano Ronaldo VS Messi :</label>    
            </td> 
                <td>
                <input type="radio" id="QP3" name="QP3" value="0" /> <label for="Gauche">Cristiano Ronaldo</label>          
                <input type="radio" id="QP3" name="QP3" value="1" /> <label for="Droite">Messi</label>
                </td>         
            </tr> 

            <tr>
                <td></td>
                <td align="center">
                    <input type="submit" name="inscription" value="Je m'inscris" />
                </td>
            </tr>
            
                 
        </table>
    </form>

</div>

<!--
<h1>Veuillez remplir les champs ci-dessous :</h1>
<form action="connexion.php" method="post">
    <label>Pseudo : <input type="text" name="pseudo"></label>
    <label>Mot de passe : <input type="password" name="mdp"></label>
    <label>Vérification mdp : <input type="password" name="remdp"></label>
    <input type="button">
</form>
