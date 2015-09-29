<?php
/**
 * Classe d'accès à la table `utilisateur`
 *
 * @filesource model/table/UtilisateurTable.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */

require_once 'model/class/Utilisateur.php';
require_once 'kernel/Database.php';

class UtilisateurTable {
    
    /**
     * connexion de l'utilisateur
     * @param String $identifiant
     * @param String $motdepasse
     * @return Utilisateur Utilisateur qui a ouvert la connexion
     */
    public static function connexion($identifiant,$motdepasse){
        $dbh = Database::connect();
        
        $query = "SELECT * FROM `utilisateur`" . "\r\n"
                . "WHERE identifiant = :identifiant" . "\r\n"
                . "AND   motdepasse  = :motdepasse;";
        
        $sth = $dbh->prepare($query);
        $sth->bindParam(':identifiant', $identifiant);
        $sth->bindParam(':motdepasse', $motdepasse);
        
        $sth->execute();
        if($sth->rowCount() == 1)
        {
            $utilisateur = $sth->fetch(PDO::FETCH_ASSOC);
        }
        else
        {
            $utilisateur = null;
        }
        
        Database::disconnect();
        
        return $utilisateur;
    }
}
?>