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
        $id_groupe = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        if(isset($_POST['btn_ajouter_x']))
        {
            $args = array(
                'selected_others_id' => array(
                    'filter' => FILTER_SANITIZE_NUMBER_INT,
                    'flags'  => FILTER_REQUIRE_ARRAY,
                   )
            );
            $filtered = filter_input_array(INPUT_POST, $args);
            
            foreach ($filtered['selected_others_id'] as $id_utilisateur)
            {
                $item['id_utilisateur'] = $id_utilisateur;
                $item['id_groupe'] = $id_groupe;
                AffecterTable::insert($item);
            }
        }

        if(isset($_POST['btn_enlever_x']))
        {
            $args = array(
                'selected_members_id' => array(
                    'filter' => FILTER_SANITIZE_NUMBER_INT,
                    'flags'  => FILTER_REQUIRE_ARRAY,
                   )
            );
            $filtered = filter_input_array(INPUT_POST, $args);
            
            foreach ($filtered['selected_members_id'] as $id_utilisateur)
            {
                
                $ids['id_utilisateur'] = $id_utilisateur;
                $ids['id_groupe'] = $id_groupe;
                
                AffecterTable::delete($ids);
            }
        }
        
        $members = AffecterTable::get_members($id_groupe);
        $members_ids = array();
        
        $items = AffecterTable::get_members_ids($id_groupe);
        foreach($items as $item)
        {
            $members_ids[] = $item->id;
        }
        
        $others  = AffecterTable::get_others($id_groupe);
        $others_ids = array();
        
        $items  = AffecterTable::get_others_ids($id_groupe);
        foreach($items as $item)
        {
            $others_ids[] = $item->id;
        }
        
        $groupe  = GroupeTable::select_by_id($id_groupe);
        
        AffecterViewer::link($members, $members_ids, $others, $others_ids, $groupe);
    }
}
?>