<?php
/**
 * Classe Attribuer
 *
 * @filesource model/class/Attribuer.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Attribuer {
    
    /**
     * Properties
     */
    
    /**
     * @property int $id_droit Primary Key, Foreign Key references droit->id
     * @access public
     */
    public $id_droit;
    
    /**
     * @property int $id_groupe Primary Key, Foreign Key references groupe->id
     * @access public
     */
    public $id_groupe;
    
    /**
     * Methods
     */
    
    public function __toString() {
        return "(" . $this->id_droit . "," . $this->id_groupe . ")";
    }
}
?>