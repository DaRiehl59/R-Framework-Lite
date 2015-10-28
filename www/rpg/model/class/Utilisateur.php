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
     * @access private
     */
    private $id;
    
     /**
     * @property String $identifiant
     * @access private
     */
    private $identifiant;

     /**
     * @property String $motdepasse
     * @access private
     */
    private $motdepasse;
        
     /**
     * @property String $pseudo
     * @access private
     */
    private $pseudo;
        
     /**
     * @property String $avatar
     * @access private
     */
    private $avatar;
        
    /**
     * @property String $nom
     * @access private
     */
    private $nom;
    
    /**
     * @property int $id_confid_nom
     * @access private
     */
    private $id_confid_nom;
    
    /**
     * @property String $email
     * @access private
     */
    private $email;

    /**
     * @property String $email_hash
     * @access private
     */
    private $email_hash;

    /**
     * @property int $id_confid_email
     * @access private
     */
    private $id_confid_email;
    
    /**
     * @property String $ville
     * @access private
     */
    private $ville;

    /**
     * @property int $id_confid_ville
     * @access private
     */
    private $id_confid_ville;
    
    /**
     * @property int $id_pays
     * @access private
     */
    private $id_pays;

    /**
     * @property int $id_confid_id_pays
     * @access private
     */
    private $id_confid_id_pays;
    
     /**
     * @property String $description
     * @access private
     */
    private $description;

    /**
     * @property int $id_confid_description
     * @access private
     */
    private $id_confid_description;
    
   /**
     * Methods
     */
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function __toString() {
        return "$this->pseudo ($this->nom)";
    }
}
?>