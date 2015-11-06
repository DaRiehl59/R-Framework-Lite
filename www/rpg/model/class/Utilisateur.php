<?php
/**
 * Classe Utilisateur
 *
 * @filesource model/class/Utilisateur.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Utilisateur {
    
    /**
     * Properties
     */
    
    /**
     * @property int $id Clé Primaire
     * @access public
     */
    public $id;
    
     /**
     * @property String $identifiant
     * @access public
     */
    public $identifiant;

     /**
     * @property String $motdepasse
     * @access public
     */
    public $motdepasse;
        
     /**
     * @property String $pseudo
     * @access public
     */
    public $pseudo;
        
     /**
     * @property String $avatar
     * @access public
     */
    public $avatar;
        
    /**
     * @property String $nom
     * @access public
     */
    public $nom;
    
    /**
     * @property int $id_confid_nom
     * @access public
     */
    public $id_confid_nom;
    
    /**
     * @property String $email
     * @access public
     */
    public $email;

    /**
     * @property String $email_hash
     * @access public
     */
    public $email_hash;

    /**
     * @property int $id_confid_email
     * @access public
     */
    public $id_confid_email;
    
    /**
     * @property String $ville
     * @access public
     */
    public $ville;

    /**
     * @property int $id_confid_ville
     * @access public
     */
    public $id_confid_ville;
    
    /**
     * @property int $id_pays
     * @access public
     */
    public $id_pays;

    /**
     * @property int $id_confid_id_pays
     * @access public
     */
    public $id_confid_id_pays;
    
     /**
     * @property String $description
     * @access public
     */
    public $description;

    /**
     * @property int $id_confid_description
     * @access public
     */
    public $id_confid_description;
    
   /**
     * Methods
     */
    
    public function __toString() {
        return "$this->pseudo ($this->nom)";
    }
}
?>