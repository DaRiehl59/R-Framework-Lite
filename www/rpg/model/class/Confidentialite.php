<?php
/**
 * Classe Confidentialite
 *
 * @filesource model/class/Confidentialite.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Confidentialite {
    
    /**
     * Properties
     */
    
    /**
     * @property int $id Primary Key
     * @access public
     */
    public $id;
    
    /**
     * @property string $libelle
     * @access public
     */
    public $libelle;
    
    
    /**
     * Methods
     */
    
    public function __toString() {
        return $this->libelle;
    }
}
?>