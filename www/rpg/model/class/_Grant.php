<?php
/**
 * Classe _Grant
 *
 * @filesource model/class/_Grant.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class _Grant {
    
    /**
     * Properties
     */
    
    /**
     * @property int $privilege_id Primary Key, Foreign Key references Privilege->id
     * @access public
     */
    public $privilege_id;
    
    /**
     * @property int $group_id Primary Key, Foreign Key references Group->id
     * @access public
     */
    public $group_id;
    
    /**
     * Methods
     */
    
    public function __toString() {
        return "(" . $this->privilege_id . "," . $this->group_id . ")";
    }
}
?>
