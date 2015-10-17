<?php
/**
 * Classe Groupe
 *
 * @filesource model/class/Utilisateur.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Groupe {
    
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
     * @property String $avatar URL to avatar
     * @access private
     */
    private $avatar;

    /**
     * Methods
     */
    
    public function __construct() {
        $num = func_num_args();
        if(method_exists($this, "__construct".$num))
        {
            call_user_func_array(array($this,"__construct".$num), func_get_args());
        }
        else
        {
            throw new Exception("Constructor do not accept ".$num." argument(s).");
        }
    }
    
    public function __construct0()
    {
        $this->id = null;
        $this->nom = null;
        $this->avatar = null;
    }

    public function __construct1($item)
    {
        $this->id = $item['id'];
        $this->nom = $item['nom'];
        $this->avatar = $item['avatar'];
    }

    public function __construct3($id, $nom, $avatar)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->avatar = $avatar;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
}
?>