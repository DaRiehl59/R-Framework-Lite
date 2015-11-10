<?php
/**
 * Classe Groupe
 *
 * @filesource model/class/Groupe.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Personnage {
    
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
     * @property string $avatar
     * @access public
     */
    public $avatar;

    /**
     * @property string $actif
     * @access public
     */
    public $actif;

    /**
     * @property int $id_utilisateur
     * @access public
     */
    public $id_utilisateur;

    /**
     * Methods
     */
    
    public function __toString() {
        return $this->nom;
    }
}
?>