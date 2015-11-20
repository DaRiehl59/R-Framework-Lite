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
     * @var string $table
     * @access private
     */
    private static $table = "affecter";
    
    /**
     * recherche d'un membre par son id
     * @param int $id_groupe
     * @return array élément correspondant à la valeur de id
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
        }
        else
        {
            $items = array();
        }
        
        $sth->closeCursor();
        Database::disconnect();
        
        return $items;
    }

    /**
     * recherche d'un membre par son id
     * @param int $id_groupe
     * @return array élément correspondant à la valeur de id
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
        }
        else
        {
            $items = array();
        }
        
        $sth->closeCursor();
        Database::disconnect();
        
        return $items;
    }

    /**
     * recherche d'un autre par son id
     * @param int $id_groupe
     * @return array élément correspondant à la valeur de id
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
        }
        else
        {
            $items = array();
        }
        
        $sth->closeCursor();
        Database::disconnect();
        
        return $items;
    }

    /**
     * recherche d'un autre par son id
     * @param int $id_groupe
     * @return array élément correspondant à la valeur de id
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
        }
        else
        {
            $items = array();
        }
        
        $sth->closeCursor();
        Database::disconnect();
        
        return $items;
    }
    
    /**
     * recherche des éléments associés à un id
     * @param string $classname
     * @param string $FK_name
     * @param mixed $FK_value
     * @return array élément correspondant à la valeur de id
     */
    public static function get_linked_items($classname,$FK_name,$FK_value){
        $dbh = Database::connect();
        
        $fields = get_object_vars(new Affecter());
        unset($fields[$FK_name]);
        $result_FK_name = array_keys($fields)[0];
        
        $query  = "SELECT *" . "\r\n"
                . "FROM `" . $classname . "`" . "\r\n"
                . "WHERE `id` IN" . "\r\n"
                . "(" . "\r\n"
                . "    SELECT `" . $result_FK_name . "`" . "\r\n"
                . "    FROM `" . self::$table . "`" . "\r\n"
                . "    WHERE `" . $FK_name . "` = :FK_name" . "\r\n"
                . ");";
        
        $sth = $dbh->prepare($query);
        $sth->bindParam(':FK_name', $FK_value);
        
        $sth->setFetchMode(PDO::FETCH_CLASS, $classname);
        $sth->execute();
        
        if($sth->rowCount())
        {
            $items = $sth->fetchAll(PDO::FETCH_CLASS, $classname);
        }
        else
        {
            $items = array();
        }
        
        $sth->closeCursor();
        Database::disconnect();
        
        return $items;
    }

    /**
     * recherche des éléments non associés à un id
     * @param string $classname
     * @param string $FK_name
     * @param mixed $FK_value
     * @return array élément correspondant à la valeur de id
     */
    public static function get_unlinked_items($classname,$FK_name,$FK_value){
        $dbh = Database::connect();
        
        $fields = get_object_vars(new Affecter());
        unset($fields[$FK_name]);
        $result_FK_name = array_keys($fields)[0];
        
        $query  = "SELECT *" . "\r\n"
                . "FROM `" . $classname . "`" . "\r\n"
                . "WHERE `id` NOT IN" . "\r\n"
                . "(" . "\r\n"
                . "    SELECT `" . $result_FK_name . "`" . "\r\n"
                . "    FROM `" . self::$table . "`" . "\r\n"
                . "    WHERE `" . $FK_name . "` = :FK_name" . "\r\n"
                . ");";
        
        $sth = $dbh->prepare($query);
        $sth->bindParam(':FK_name', $FK_value);
        
        $sth->setFetchMode(PDO::FETCH_CLASS, $classname);
        $sth->execute();
        
        if($sth->rowCount())
        {
            $items = $sth->fetchAll(PDO::FETCH_CLASS, $classname);
        }
        else
        {
            $items = array();
        }
        
        $sth->closeCursor();
        Database::disconnect();
        
        return $items;
    }

    /**
     * insertion d'un nouvel enregistrement
     * @param array $item
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
        
        $sth->closeCursor();
        Database::disconnect();
        
        return $result;
    }

    /**
     * suppresssion d'un enregistrement
     * @param array $ids Fields included in Primary Key
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
        
        $sth->closeCursor();
        Database::disconnect();
        
        return $result;
    }
}
?>