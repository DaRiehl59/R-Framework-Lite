<?php
/**
 * Classe Affecter
 *
 * @filesource model/class/Affecter.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */
class Affecter {
    
    /**
     * Properties
     */
    
    /**
     * @property int $id_utilisateur Clé Etrangère vers utilisateur et membre de la Clé Primaire
     * @access private
     */
    private $id_utilisateur;
    
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
        $this->id_utilisateur = $item['id_utilisateur'];
        $this->id_groupe = $item['id_groupe'];
    }

    public function __construct2($id_utilisateur, $id_groupe)
    {
        $this->id_utilisateur = $id_utilisateur;
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