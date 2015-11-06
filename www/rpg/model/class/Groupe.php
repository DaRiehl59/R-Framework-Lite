<?php
/**
 * Classe Groupe
 *
 * @filesource model/class/Groupe.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Groupe {
    
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
     * @property String $description
     * @access public
     */
    public $description;
    
    /**
     * @property String $maximum
     * @access public
     */
    public $maximum;
    
    /**
     * @property String $avatar URL to avatar
     * @access public
     */
    public $avatar;

    /**
     * Methods
     */
    
    public function __toString() {
        return $this->nom;
    }
}
?>