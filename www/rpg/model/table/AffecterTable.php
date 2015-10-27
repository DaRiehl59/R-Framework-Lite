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
     * recherche de tous les enregistrements
     * @param Array $fields
     * @return Utilisateur Utilisateur correspondant à id
     */
    public static function select(){
        if(!func_num_args())
        {
            $fields = array('*');
        }
        else
        {
            $fields = func_get_args();
        }
        
        
        $dbh = Database::connect();
        
        $query  = "SELECT ";
        foreach ($fields as $field)
        {
            $query .= "" . $field . ", ";
        }
        $query = substr($query, 0,  strlen($query) - 2);
        $query .= " FROM `" . self::$table . "`;";
        
        $sth = $dbh->prepare($query);
        $sth->setFetchMode( PDO::FETCH_CLASS, self::$table);
        $sth->execute();
        
        if($sth->rowCount())
        {
            $results = $sth->fetchAll(PDO::FETCH_CLASS, self::$table);
            $sth->closeCursor();
        }
        else
        {
            $results = null;
        }
        
        Database::disconnect();
        
        return $results;
    }
    
    /**
     * recherche d'un membre par son id
     * @param int $id_groupe
     * @return Array élément correspondant à la valeur de id
     */
    public static function select_members_by_id_groupe($id_groupe){
        $dbh = Database::connect();
        
        $query  = "SELECT *" . "\r\n"
                . "FROM `utilisateur`" . "\r\n"
                . "WHERE `id` IN" . "\r\n"
                . "(" . "\r\n"
                . "    SELECT `id_utilisateur`" . "\r\n"
                . "    FROM `" . self::$table . "`" . "\r\n"
                . "    WHERE id_groupe = :id_groupe" . "\r\n"
                . ");";
        
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
    public static function select_others_by_id_groupe($id_groupe){
        $dbh = Database::connect();
        
        $query  = "SELECT *" . "\r\n"
                . "FROM `utilisateur`" . "\r\n"
                . "WHERE `id` NOT IN" . "\r\n"
                . "(" . "\r\n"
                . "    SELECT `id_utilisateur`" . "\r\n"
                . "    FROM `" . self::$table . "`" . "\r\n"
                . "    WHERE id_groupe = :id_groupe" . "\r\n"
                . ");";
        
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
     * insertion d'un nouvel enregistrement
     * @param String $item
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
     * mise à jour d'un enregistrement
     * @param String $item
     * @return boolean $result résultat de la requête SQL
     */
    public static function update($item){
        $dbh = Database::connect();
        
        $query = "UPDATE `" . self::$table . "` SET" . "\r\n";
        
        $fields = array_keys($item);
        
        foreach($fields as $field)
        {
            $query .= $field . " = :".$field . "," . "\r\n";
        }
        $query  = substr($query, 0, strlen($query) -3);
        $query .= ";";
        
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
     * @param String $id
     * @return boolean $result résultat de la requête SQL
     */
    public static function delete($id){
        $dbh = Database::connect();
        
        $query = "DELETE FROM `" . self::$table . "` WHERE" . "\r\n"
                . "id = :id";
        
        $sth = $dbh->prepare($query);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        
        $result = $sth->execute();
        
        Database::disconnect();
        
        return $result;
    }
    
    /**
     * purge de la table
     * @param String $id
     * @return boolean $result résultat de la requête SQL
     */
    public static function truncate(){
        $dbh = Database::connect();
        
        $query = "DELETE FROM `" . self::$table . "`";
        
        $sth = $dbh->prepare($query);
        $result = $sth->execute();
        
        Database::disconnect();
        
        return $result;
    }
}
?>