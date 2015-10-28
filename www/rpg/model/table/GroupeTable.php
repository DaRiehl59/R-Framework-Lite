<?php
/**
 * Classe d'accès à la table `groupe`
 *
 * @filesource model/table/GroupeTable.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */

require_once 'kernel/Database.php';

require_once 'model/class/Groupe.php';

class GroupeTable {
    
    /**
     * nom de la table
     * @var String $table
     * @access private
     */
    private static $table = "groupe";
    
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
     * recherche d'un enregistrement par son id
     * @param int $id
     * @return Object élément correspondant à la valeur de id
     */
    public static function select_by_id($id){
        $dbh = Database::connect();
        
        $query = "SELECT * FROM `" . self::$table . "`" . "\r\n"
                . "WHERE id = :id;";
        
        $sth = $dbh->prepare($query);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        
        $sth->setFetchMode( PDO::FETCH_CLASS, self::$table);
        $sth->execute();
        
        if($sth->rowCount() == 1)
        {
            $item = $sth->fetch(PDO::FETCH_CLASS);
            $sth->closeCursor();
        }
        else
        {
            $item = null;
        }
        
        Database::disconnect();
        
        return $item;
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
     * mise à jour d'un enregistrement
     * @param Array $item
     * @return boolean $result résultat de la requête SQL
     */
    public static function update($item){
        $dbh = Database::connect();
        
        $query = "UPDATE `" . self::$table . "` SET" . "\r\n";
        
        $fields = array_keys($item);
        unset($fields['id']);
        
        foreach($fields as $field)
        {
            $query .= $field . " = :".$field . "," . "\r\n";
        }
        $query  = substr($query, 0, strlen($query) -3) . "\r\n";
        $query .= "WHERE id = :id;";
        
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
     * @param int $id
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
}
?>