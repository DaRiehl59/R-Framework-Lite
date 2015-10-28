<?php
/**
 * Classe d'accès à la table `affecter`
 *
 * @filesource model/table/AffecterTable.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */

require_once 'kernel/Database.php';

require_once 'model/class/Affecter.php';

class AffecterTable {
    
    /**
     * nom de la table
     * @var String $table
     * @access private
     */
    private static $table = "affecter";
    
    /**
     * recherche d'un membre par son id
     * @param int $id_groupe
     * @return Array élément correspondant à la valeur de id
     */
    public static function get_members($id_groupe){
        $dbh = Database::connect();
        
        $query  = "SELECT *" . "\r\n"
                . "FROM `utilisateur`" . "\r\n"
                . "WHERE `id` IN" . "\r\n"
                . "(" . "\r\n"
                . "    SELECT `id_utilisateur`" . "\r\n"
                . "    FROM `" . self::$table . "`" . "\r\n"
                . "    WHERE id_groupe = :id_groupe" . "\r\n"
                . ")" . "\r\n"
                . "ORDER BY pseudo ASC;";
        
        $sth = $dbh->prepare($query);
        $sth->bindParam(':id_groupe', $id_groupe, PDO::PARAM_INT);
        
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute();
        
        if($sth->rowCount())
        {
            $items = $sth->fetchAll(PDO::FETCH_CLASS, 'Utilisateur');
            $sth->closeCursor();
        }
        else
        {
            $items = array();
        }
        
        Database::disconnect();
        
        return $items;
    }

    /**
     * recherche d'un membre par son id
     * @param int $id_groupe
     * @return Array élément correspondant à la valeur de id
     */
    public static function get_members_ids($id_groupe){
        $dbh = Database::connect();
        
        $query  = "SELECT id" . "\r\n"
                . "FROM `utilisateur`" . "\r\n"
                . "WHERE `id` IN" . "\r\n"
                . "(" . "\r\n"
                . "    SELECT `id_utilisateur`" . "\r\n"
                . "    FROM `" . self::$table . "`" . "\r\n"
                . "    WHERE id_groupe = :id_groupe" . "\r\n"
                . ")" . "\r\n"
                . "ORDER BY pseudo ASC;";
        
        $sth = $dbh->prepare($query);
        $sth->bindParam(':id_groupe', $id_groupe, PDO::PARAM_INT);
        
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute();
        
        if($sth->rowCount())
        {
            $items = $sth->fetchAll(PDO::FETCH_CLASS, 'Utilisateur');
            $sth->closeCursor();
        }
        else
        {
            $items = array();
        }
        
        Database::disconnect();
        
        return $items;
    }

    /**
     * recherche d'un autre par son id
     * @param int $id_groupe
     * @return Array élément correspondant à la valeur de id
     */
    public static function get_others($id_groupe){
        $dbh = Database::connect();
        
        $query  = "SELECT *" . "\r\n"
                . "FROM `utilisateur`" . "\r\n"
                . "WHERE `id` NOT IN" . "\r\n"
                . "(" . "\r\n"
                . "    SELECT `id_utilisateur`" . "\r\n"
                . "    FROM `" . self::$table . "`" . "\r\n"
                . "    WHERE id_groupe = :id_groupe" . "\r\n"
                . ")" . "\r\n"
                . "ORDER BY pseudo ASC;";
        
        $sth = $dbh->prepare($query);
        $sth->bindParam(':id_groupe', $id_groupe, PDO::PARAM_INT);
        
        $sth->setFetchMode( PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute();
        
        if($sth->rowCount())
        {
            $items = $sth->fetchAll(PDO::FETCH_CLASS, 'Utilisateur');
            $sth->closeCursor();
        }
        else
        {
            $items = array();
        }
        
        Database::disconnect();
        
        return $items;
    }

    /**
     * recherche d'un autre par son id
     * @param int $id_groupe
     * @return Array élément correspondant à la valeur de id
     */
    public static function get_others_ids($id_groupe){
        $dbh = Database::connect();
        
        $query  = "SELECT id" . "\r\n"
                . "FROM `utilisateur`" . "\r\n"
                . "WHERE `id` NOT IN" . "\r\n"
                . "(" . "\r\n"
                . "    SELECT `id_utilisateur`" . "\r\n"
                . "    FROM `" . self::$table . "`" . "\r\n"
                . "    WHERE id_groupe = :id_groupe" . "\r\n"
                . ")" . "\r\n"
                . "ORDER BY pseudo ASC;";
        
        $sth = $dbh->prepare($query);
        $sth->bindParam(':id_groupe', $id_groupe, PDO::PARAM_INT);
        
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute();
        
        if($sth->rowCount())
        {
            $items = $sth->fetchAll(PDO::FETCH_CLASS, 'Utilisateur');
            $sth->closeCursor();
        }
        else
        {
            $items = array();
        }
        
        Database::disconnect();
        
        return $items;
    }
    
    /**
     * insertion d'un nouvel enregistrement
     * @param Array $item
     * @return boolean $result résultat de la requête SQL
     */
    public static function insert($item){
        $dbh = Database::connect();
        
        $query = "INSERT INTO `" . self::$table . "` (";
        
        $fields = array_keys($item);
        
        foreach($fields as $field)
        {
            $query .= $field . ", ";
        }
        $query  = substr($query, 0, strlen($query) -2);
        $query .= ")\r\nVALUES\r\n(";
        
        foreach($fields as $field)
        {
            $query .= ":" . $field . ", ";
        }
        $query  = substr($query, 0, strlen($query) -2);
        $query .= ");";
        
        $sth = $dbh->prepare($query);
        
        foreach($item as $field => $value)
        {
            
            $sth->bindParam(':' . $field, $item[$field]);
        }
        
        $result = $sth->execute();
        
        Database::disconnect();
        
        return $result;
    }

    /**
     * suppresssion d'un enregistrement
     * @param Array $ids Fields included in Primary Key
     * @return boolean $result résultat de la requête SQL
     */
    public static function delete($ids){
        $dbh = Database::connect();
        
        $query = "DELETE FROM `" . self::$table . "`" . "\r\n"
               . "WHERE 1" . "\r\n";
        
        $fields = array_keys($ids);
        
        foreach($fields as $field)
        {
            $query .= "AND " . $field . " = :".$field . "\r\n";
        }
        
        $query .= ";";
        
        $sth = $dbh->prepare($query);
        
        foreach($ids as $field => $value)
        {
            
            $sth->bindParam(':' . $field, $ids[$field]);
        }
        
        $result = $sth->execute();
        
        Database::disconnect();
        
        return $result;
    }
}
?>