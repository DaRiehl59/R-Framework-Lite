<?php
/**
 * Group Class
 *
 * @filesource model/class/Group.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Group {
    
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
     * @property string $description
     * @access public
     */
    public $description;
    
    /**
     * @property string $avatar
     * @access public
     */
    public $avatar;

    /**
     * @property boolean $connected
     * @access public
     */
    public $connected;

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
