<?php
/**
 * Classe d'accès à la table `pays`
 *
 * @filesource model/table/PaysTable.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */

require_once 'kernel/Database.php';

require_once 'model/class/Pays.php';

class PaysTable {
    
    /**
     * nom de la table
     * @var String $table
     * @access private
     */
    private static $table = "pays";
    
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
            $items = $sth->fetchAll(PDO::FETCH_CLASS, self::$table);
        }
        else
        {
            $items = array();
        }
        
        $sth->closeCursor();
        Database::disconnect();
        
        return $items;
    }
}
?>