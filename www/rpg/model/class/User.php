<?php
/**
 * User Class
 *
 * @filesource model/class/Utilisateur.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class User {
    
    /**
     * Properties
     */
    
    /**
     * @property int $id Primary Key
     * @access public
     */
    public $id;
    
     /**
     * @property string $login
     * @access public
     */
    public $login;

     /**
     * @property string $password
     * @access public
     */
    public $password;
        
     /**
     * @property string $pseudonym
     * @access public
     */
    public $pseudonym;
        
     /**
     * @property string $avatar
     * @access public
     */
    public $avatar;
        
    /**
     * @property string $name
     * @access public
     */
    public $name;
    
    /**
     * @property string $firstname
     * @access public
     */
    public $firstname;
    
    /**
     * @property date $birthdate
     * @access public
     */
    public $birthdate;
    
    /**
     * @property character $sex ('M', 'F')
     * @access public
     */
    public $sex;
    
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
     * @property string $city
     * @access public
     */
    public $city;

     /**
     * @property string $description
     * @access public
     */
    public $description;

     /**
     * @property int $activate
     * @access public
     */
    public $activate;

    /**
     * @property int $country_id Foreign Key references Country->id
     * @access public
     */
    public $country_id;

   /**
     * Methods
     */
    
    public function __toString() {
        
        $str=(empty($this->firstname) || empty($this->name))?"":" ";
        return $this->pseudonym . " (" . $this->firstname . $str . $this->name . ")";
    }
    
    /**
     * @access public
     * @return boolean return true if email_hash match with gravatar
     */
    public function hasGravatar()
    {
        $url = 'http://www.gravatar.com/avatar/'.$this->email_hash.'/?d=404';
        return get_http_response_code($url) == '200';
    }
}
?>
