<?php
/**
 * Classe Pays
 *
 * @filesource model/class/Pays.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Pays {
    
    /**
     * Properties
     */
    
    /**
     * @property int $id Clé Primaire
     * @access private
     */
    private $id;
    
    /**
     * @property int $code
     * @access private
     */
    private $code;
    
    /**
     * @property String $alpha2
     * @access private
     */
    private $alpha2;
    
    /**
     * @property String $alpha3
     * @access private
     */
    private $alpha3;
    
    /**
     * @property String $nom_fr_fr
     * @access private
     */
    private $nom_fr_fr;
    
    /**
     * @property String $nom_en_gb
     * @access private
     */
    private $nom_en_gb;
    
    
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
        $this->code = $item['code'];
        $this->alpha2 = $item['alpha2'];
        $this->alpha3 = $item['alpha3'];
        $this->nom_fr_fr = $item['nom_fr_fr'];
        $this->nom_en_gb = $item['nom_en_gb'];
    }

    public function __construct6($id, $code, $alpha2, $alpha3, $nom_fr_fr, $nom_en_gb)
    {
        $this->id =  func_get_arg(0);
        $this->code = func_get_arg(1);
        $this->alpha2 = func_get_arg(2);
        $this->alpha3 = func_get_arg(3);
        $this->nom_fr_fr = func_get_arg(4);
        $this->nom_en_gb = func_get_arg(5);
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
}
?>