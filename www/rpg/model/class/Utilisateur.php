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
     * @property String $nom Nom de l'utilisateur
     * @access private
     */
    private $nom;
    
    /**
     * @property String $email Adresse email de l'utilisateur
     * @access private
     */
    private $email;

     /**
     * @property String $identifiant Identifiant de l'utilisateur
     * @access private
     */
    private $identifiant;

     /**
     * @property String $motdepasse Mot de passe de l'utilisateur
     * @access private
     */
    private $motdepasse;
        
    /**
     * Methods
     */
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
}
?>