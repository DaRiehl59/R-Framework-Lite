<?php
/**
 * Classe de controle des droits
 *
 * @filesource controler/class/DroitControler.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */

require_once 'kernel/Database.php';
require_once 'model/table/DroitTable.php';
require_once 'view/class/DroitViewer.php';

class DroitControler {
    public static function liste()
    {
        global $PARAM;
        
        if(isset($_POST['btn_ajouter']))
        {
            $item['nom'] = filter_input(INPUT_POST, 'nom',FILTER_SANITIZE_STRING);
            
            $result = DroitTable::insert($item);
        }
        
        if(isset($_POST['btn_update']))
        {
            $item['id'] = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_NUMBER_INT);
            $item['nom'] = filter_input(INPUT_POST, 'nom',FILTER_SANITIZE_STRING);
            
            $result = DroitTable::update($item);
        }
        
        if(isset($_POST['btn_delete']))
        {
            $id = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_NUMBER_INT);
            

            $result = DroitTable::delete($id);
            
        }
        
        $items = DroitTable::select('*');
        DroitViewer::liste($items);
    }
    
    public static function editer()
    {
        $id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
        
        $item = DroitTable::select_by_id($id);
        if(is_null($item))
        {
            $previous_url = "?c=droit";
            DefaultViewer::error("Droit inconnu." , $previous_url);
        }
        else
        {
            DroitViewer::editer($item);
        }
    }
    
    public static function supprimer()
    {
        $id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
        
        $item = DroitTable::select_by_id($id);
        if(is_null($item))
        {
            $previous_url = "?c=droit";
            DefaultViewer::error("Droit inconnu." , $previous_url);
        }
        else
        {
            DroitViewer::supprimer($item);
        }
    }
}
?>