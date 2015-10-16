<?php
/**
 * Classe de controle des groupes
 *
 * @filesource controler/class/GroupeControler.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */

require_once 'kernel/Database.php';
//require_once 'model/table/GroupeTable.php';
require_once 'view/class/GroupeViewer.php';

class GroupeControler {
    public static function liste()
    {
        $groupes = array(
          array('id' => 1, 'nom' => 'test', 'avatar' => 'test.png'),
          array('id' => 2, 'nom' => 'test', 'avatar' => 'test.png'),
        );
        GroupeViewer::liste($groupes);
    }
}
?>