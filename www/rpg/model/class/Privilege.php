<?php
/**
 * Privilege Class
 *
 * @filesource model/class/Privilege.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Privilege {
    
    /**
     * Properties
     */
    
    /**
     * @property int $id Primary Key
     * @access public
     */
    public $id;
    
    /**
     * @property string $name
     * @access public
     */
    public $name;
    
    /**
     * @property boolean $activate
     * @access public
     */
    public $activate;
    
    /**
     * Methods
     */
    
    public function __toString() {
        return $this->name;
    }
}
?>
