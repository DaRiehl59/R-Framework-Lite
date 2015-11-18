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
     * @property int $id Primary Key
     * @access public
     */
    public $id;
    
     /**
     * @property string $identifiant
     * @access public
     */
    public $identifiant;

     /**
     * @property string $motdepasse
     * @access public
     */
    public $motdepasse;
        
     /**
     * @property string $pseudo
     * @access public
     */
    public $pseudo;
        
     /**
     * @property string $avatar
     * @access public
     */
    public $avatar;
        
    /**
     * @property string $nom
     * @access public
     */
    public $nom;
    
    /**
     * @property int $id_confid_nom Foreign Key references Confidentialite->id
     * @access public
     */
    public $id_confid_nom;
    
    /**
     * @property string $email
     * @access public
     */
    public $email;

    /**
     * @property string $email_hash
     * @access public
     */
    public $email_hash;

    /**
     * @property int $id_confid_email Foreign Key references Confidentialite->id
     * @access public
     */
    public $id_confid_email;
    
    /**
     * @property string $ville
     * @access public
     */
    public $ville;

    /**
     * @property int $id_confid_ville Foreign Key references Confidentialite->id
     * @access public
     */
    public $id_confid_ville;
    
    /**
     * @property int $id_pays Foreign Key references Pays->id
     * @access public
     */
    public $id_pays;

    /**
     * @property int $id_confid_pays Foreign Key references Confidentialite->id
     * @access public
     */
    public $id_confid_pays;
    
     /**
     * @property string $description
     * @access public
     */
    public $description;

    /**
     * @property int $id_confid_description Foreign Key references Confidentialite->id
     * @access public
     */
    public $id_confid_description;
    
     /**
     * @property int $actif
     * @access public
     */
    public $actif;

    /**
     * @property int $id_utilisateur_parrainer Foreign Key references Utilisateur->id
     * @access public
     */
    public $id_utilisateur_parrainer;
    
    /**
     * @property int $id_niveau_utilisateur Foreign Key references Niveau_Utilisateur->id
     * @access public
     */
    public $id_niveau_utilisateur;
    
   /**
     * Methods
     */
    
    public function __toString() {
        return "$this->pseudo ($this->nom)";
    }
}
?>