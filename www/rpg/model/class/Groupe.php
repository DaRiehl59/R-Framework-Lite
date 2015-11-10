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
     * @property int $maximum
     * @access public
     */
    public $maximum;
    
    /**
     * @property string $avatar
     * @access public
     */
    public $avatar;

    /**
     * @property boolean $connecte
     * @access public
     */
    public $connecte;

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