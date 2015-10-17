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
require_once 'model/table/GroupeTable.php';
require_once 'view/class/GroupeViewer.php';

class GroupeControler {
    public static function liste()
    {
        /*
        $groupes = array(
          array('id' => 1, 'nom' => 'test 1', 'avatar' => '1.png'),
          array('id' => 2, 'nom' => 'test 2', 'avatar' => '2.png'),
          array('id' => 3, 'nom' => 'ZZZZZZZZZZZZZZZZZZZZ', 'avatar' => '2.png'),
          array('id' => 4, 'nom' => 'ZZZZZZZZZZZZZZZZZZZZ', 'avatar' => '2.png'),
          array('id' => 5, 'nom' => 'ZZZZZZZZZZZZZZZZZZZZ', 'avatar' => '2.png'),
          array('id' => 6, 'nom' => 'ZZZZZZZZZZZZZZZZZZZZ', 'avatar' => '2.png'),
          array('id' => 7, 'nom' => 'ZZZZZZZZZZZZZZZZZZZZ', 'avatar' => '2.png'),
          array('id' => 8, 'nom' => 'ZZZZZZZZZZZZZZZZZZZZ', 'avatar' => '2.png'),
          array('id' => 9, 'nom' => 'ZZZZZZZZZZZZZZZZZZZZ', 'avatar' => '2.png'),
          array('id' => 10, 'nom' => 'ZZZZZZZZZZZZZZZZZZZZ', 'avatar' => '2.png'),
          array('id' => 11, 'nom' => 'test 11', 'avatar' => '2.png'),
        );
        */
        $groupes = GroupeTable::select('*');
        GroupeViewer::liste($groupes);
    }
}
?>