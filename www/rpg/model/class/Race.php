<?php
/**
 * Classe Race
 *
 * @filesource model/class/Race.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Race {
    
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