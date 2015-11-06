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
     * @property int $id Clé Primaire
     * @access public
     */
    public $id;
    
    /**
     * @property String $nom
     * @access public
     */
    public $nom;
    
    /**
     * @property Boolean $actif
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