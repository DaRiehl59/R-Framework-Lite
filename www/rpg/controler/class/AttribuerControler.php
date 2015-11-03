<?php
/**
 * Classe de controle des attributions des droits aux groupes
 *
 * @filesource controler/class/AttribuerControler.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */

require_once 'kernel/Database.php';

require_once 'model/table/AttribuerTable.php';
require_once 'model/table/DroitTable.php';
require_once 'model/table/GroupeTable.php';

require_once 'view/class/AttribuerViewer.php';

class AttribuerControler {
    public static function link()
    {
        if(isset($_GET['id_droit']))
        {
            $id_droit = filter_input(INPUT_GET, 'id_droit', FILTER_SANITIZE_NUMBER_INT);
            $items1[] = DroitTable::select_by_id($id_droit);
        }
        else
        {
            $items1 = DroitTable::select('*');
        }
        
        if(isset($_GET['id_groupe']))
        {
            $id_groupe = filter_input(INPUT_GET, 'id_groupe', FILTER_SANITIZE_NUMBER_INT);
            $items2[] = GroupeTable::select_by_id($id_groupe);
        }
        else
        {
            $items2 = GroupeTable::select('*');
        }
        
        if(isset($_POST['btn_record']))
        {
            $args = array(
                'links'    => array(
                    'filter' => FILTER_SANITIZE_STRING,
                    'flags'  => FILTER_REQUIRE_ARRAY,
                   )
            );
            $filtered = filter_input_array(INPUT_POST, $args);

            if(isset($_GET['id_droit']))
            {
                AttribuerTable::delete_by_id_droit($id_droit);
            }
            elseif(isset($_GET['id_groupe']))
            {
                AttribuerTable::delete_by_id_groupe($id_groupe);
            }
            else
            {
                AttribuerTable::truncate();
            }
            
            if(isset($filtered['links']))
            {
                foreach ($filtered['links'] as $item1 => $items)
                {
                    foreach ($items as $item2 => $value)
                    {
                        $item['id_droit'] = $item1;
                        $item['id_groupe'] = $item2;
                        AttribuerTable::insert($item);
                    }
                }
            }
        }
        
        $items3  = AttribuerTable::select('*');
        
        if(! empty($items3))
        {
            foreach ($items3 as $item3)
            {
                $links[$item3->id_droit][$item3->id_groupe] = true;
            }
        }
        else
        {
            $links=array(array());
        }
        
        AttribuerViewer::link($items1, $items2, $links);
    }
}
?>