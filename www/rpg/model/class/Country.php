<?php
/**
 * Country Class
 *
 * @filesource model/class/Country.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Country {
    
    /**
     * Properties
     */
    
    /**
     * @property int $id Primary Key
     * @access public
     */
    public $id;
    
    /**
     * @property int $code
     * @access public
     */
    public $code;
    
    /**
     * @property string $alpha2
     * @access public
     */
    public $alpha2;
    
    /**
     * @property string $alpha3
     * @access public
     */
    public $alpha3;
    
    /**
     * @property string $nom_en_gb
     * @access public
     */
    public $name_en_gb;
    
    /**
     * @property string $nom_fr_fr
     * @access public
     */
    public $name_fr_fr;
    
    
    /**
     * Methods
     */
    
    public function __toString() {
        return $this->nom_fr_fr;
    }
}
?>
