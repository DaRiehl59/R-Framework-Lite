<?php
/**
 * Classe d'accès à la table `attribuer`
 *
 * @filesource model/table/AttribuerTable.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */

require_once 'kernel/Database.php';

require_once 'model/class/Droit.php';
require_once 'model/class/Attribuer.php';
require_once 'model/class/Groupe.php';

class AttribuerTable {
    
    /**
     * nom de la table
     * @var String $table
     * @access private
     */
    private static $table = "attribuer";
    
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
        }
        else
        {
            $results = null;
        }
        
        $sth->closeCursor();
        Database::disconnect();
        
        return $results;
    }
    
    /**
     * recherche des éléments attribués à un id
     * @param string $classname
     * @param string $FK_name
     * @param mixed $FK_value
     * @return array élément correspondant à la valeur de id
     */
    public static function get_linked_items($classname,$FK_name,$FK_value){
        $dbh = Database::connect();
        
        $fields = get_object_vars(new Attribuer());
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
        
        $sth->closeCursor();
        Database::disconnect();
        
        return $result;
    }

    /**
     * suppresssion d'un enregistrement
     * @param int $id_droit
     * @return boolean $result résultat de la requête SQL
     */
    public static function delete_by_id_droit($id_droit){
        $dbh = Database::connect();
        
        $query = "DELETE FROM `" . self::$table . "` WHERE" . "\r\n"
                . "id_droit = :id_droit";
        
        $sth = $dbh->prepare($query);
        $sth->bindParam(':id_droit', $id_droit, PDO::PARAM_INT);
        
        $result = $sth->execute();
        
        $sth->closeCursor();
        Database::disconnect();
        
        return $result;
    }
    
    /**
     * suppresssion d'un enregistrement
     * @param int $id_groupe
     * @return boolean $result résultat de la requête SQL
     */
    public static function delete_by_id_groupe($id_groupe){
        $dbh = Database::connect();
        
        $query = "DELETE FROM `" . self::$table . "` WHERE" . "\r\n"
                . "id_groupe = :id_groupe";
        
        $sth = $dbh->prepare($query);
        $sth->bindParam(':id_groupe', $id_groupe, PDO::PARAM_INT);
        
        $result = $sth->execute();
        
        $sth->closeCursor();
        Database::disconnect();
        
        return $result;
    }
    
    /**
     * purge de la table
     * @param int $id
     * @return boolean $result résultat de la requête SQL
     */
    public static function truncate(){
        $dbh = Database::connect();
        
        $query = "DELETE FROM `" . self::$table . "`";
        
        $sth = $dbh->prepare($query);
        $result = $sth->execute();
        
        $sth->closeCursor();
        Database::disconnect();
        
        return $result;
    }
}
?>