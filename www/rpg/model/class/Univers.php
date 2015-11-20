<?php
/**
 * Classe Univers
 *
 * @filesource model/class/Univers.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Univers {
    
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
     * @property string $carte
     * @access public
     */
    public $carte;

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