<?php
/**
 * Classe Droit
 *
 * @filesource model/class/Droit.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Droit {
    
    /**
     * Properties
     */
    
    /**
     * @property int $id Clé Primaire
     * @access private
     */
    private $id;
    
    /**
     * @property String $nom
     * @access private
     */
    private $nom;
    
    /**
     * @property Boolean $actif
     * @access private
     */
    private $actif;
    
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
    }

    public function __construct1($item)
    {
        $this->id = $item['id'];
        $this->nom = $item['nom'];
        $this->nom = $item['actif'];
    }

    public function __construct2($id, $nom)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->actif = $actif;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
}
?>