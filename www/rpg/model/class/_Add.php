<?php
/**
 * _Add Class
 *
 * @filesource model/class/_Add.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class _Add {
    
    /**
     * Properties
     */
    
    /**
     * @property int $user_id Primary Key, Foreign Key references User->id
     * @access public
     */
    public $user_id;
    
    /**
     * @property int $group_id Primary Key, Foreign Key references Group->id
     * @access public
     */
    public $group_id;
    
    /**
     * Methods
     */
    
    public function __toString() {
        return "(" . $this->user_id . "," . $this->group_id . ")";
    }
}
?>
