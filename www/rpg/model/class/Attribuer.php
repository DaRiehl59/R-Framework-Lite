<?php
/**
 * Classe Attribuer
 *
 * @filesource model/class/Attribuer.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Attribuer {
    
    /**
     * Properties
     */
    
    /**
     * @property int $id_droit Clé Etrangère vers droit et membre de la Clé Primaire
     * @access private
     */
    private $id_droit;
    
    /**
     * @property int $id_droit Clé Etrangère vers groupe et membre de la Clé Primaire
     * @access private
     */
    private $id_groupe;
    
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
        $this->id_droit = $item['id_droit'];
        $this->id_groupe = $item['id_groupe'];
    }

    public function __construct2($id_droit, $id_groupe)
    {
        $this->id_droit = $id_droit;
        $this->id_groupe = $id_groupe;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
}
?>