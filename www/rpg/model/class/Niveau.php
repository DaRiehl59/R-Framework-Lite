<?php
/**
 * Classe Niveau
 *
 * @filesource model/class/Niveau.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Niveau {
    
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
     * @property int $id Foreign Key references Niveau->id
     * @access public
     */
    public $id_niveau_suivre;
    
    /**
     * Methods
     */
    
    public function __toString() {
        return $this->nom;
    }
}
?>