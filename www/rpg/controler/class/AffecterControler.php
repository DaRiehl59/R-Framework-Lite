<?php
/**
 * Classe de controle des affectations des utilisateurs aux groupes
 *
 * @filesource controler/class/AffecterControler.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */

require_once 'kernel/Database.php';

require_once 'model/table/AffecterTable.php';
require_once 'model/table/UtilisateurTable.php';
require_once 'model/table/GroupeTable.php';

require_once 'view/class/AffecterViewer.php';

class AffecterControler {
    public static function link()
    {
        $id_groupe = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

        $members = AffecterTable::select_members_by_id_groupe($id_groupe);
        $others  = AffecterTable::select_others_by_id_groupe($id_groupe);
        $groupe  = GroupeTable::select_by_id($id_groupe);
        
        AffecterViewer::link($members, $others, $groupe);
    }
}
?>