<?php
/**
 * Classe Pays
 *
 * @filesource model/class/Pays.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Pays {
    
    /**
     * Properties
     */
    
    /**
     * @property int $id Clé Primaire
     * @access public
     */
    public $id;
    
    /**
     * @property int $code
     * @access public
     */
    public $code;
    
    /**
     * @property String $alpha2
     * @access public
     */
    public $alpha2;
    
    /**
     * @property String $alpha3
     * @access public
     */
    public $alpha3;
    
    /**
     * @property String $nom_fr_fr
     * @access public
     */
    public $nom_fr_fr;
    
    /**
     * @property String $nom_en_gb
     * @access public
     */
    public $nom_en_gb;
    
    
    /**
     * Methods
     */
    
    public function __toString() {
        return $this->nom_fr_fr;
    }
}
?>