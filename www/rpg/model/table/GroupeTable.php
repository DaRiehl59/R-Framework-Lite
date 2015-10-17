<?php
/**
 * Classe d'accès à la table `utilisateur`
 *
 * @filesource model/table/UtilisateurTable.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */

require_once 'model/class/Groupe.php';
require_once 'kernel/Database.php';

class GroupeTable {
    
    /**
     * nom de la table
     * @var String $table
     * @access private
     */
    private static $table = "groupe";
    
    /**
     * chargement des informations
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
            $results = $sth->fetchAll(PDO::FETCH_CLASS);
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
     * chargement des informations d'un élément en fonction de son id
     * @param String $id
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
     * enregistrement des informations
     * @param String $item
     * @return boolean $result résultat de la requête SQL
     */
    public static function insert($item){
        $dbh = Database::connect();
        
        $query = "INSERT INTO " . self::$table . " (";
        
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
}
?>