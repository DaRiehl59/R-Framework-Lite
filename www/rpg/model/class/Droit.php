<?php
/**
 * Classe Droit
 *
 * @filesource model/class/Droit.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Droit {
    
    /**
     * Properties
     */
    
    /**
     * @property int $id Primary Key
     * @access public
     */
    public $id;
    
    /**
     * @property string $nom
     * @access public
     */
    public $nom;
    
    /**
     * @property boolean $actif
     * @access public
     */
    public $actif;
    
    /**
     * Methods
     */
    
    public function __toString() {
        return $this->nom;
    }
}
?>