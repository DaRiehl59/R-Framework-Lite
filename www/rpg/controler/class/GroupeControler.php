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
        global $PARAM;
        
        if(isset($_POST['btn_ajouter']))
        {
            $item['avatar'] = null;
            if(isset($_FILES['userfile']))
            {
                $directory = $PARAM['groups']['avatars']['directory'];
                $item['avatar'] = upload_picture_to_dir($directory);
            }
            $item['nom'] = filter_input(INPUT_POST, 'nom',FILTER_SANITIZE_STRING);
            $item['description'] = filter_input(INPUT_POST, 'description',FILTER_SANITIZE_STRING);
            $item['maximum'] = filter_input(INPUT_POST, 'maximum',FILTER_SANITIZE_STRING);
            $item['connecte'] = (filter_input(INPUT_POST, 'connecte',FILTER_SANITIZE_STRING) == "on")?1:0;
            $item['actif'] = (filter_input(INPUT_POST, 'actif',FILTER_SANITIZE_STRING) == "on")?1:0;
            
            $result = GroupeTable::insert($item);
        }
        
        if(isset($_POST['btn_update']))
        {
            if(!empty($_FILES['userfile']['name']))
            {
                $directory = $PARAM['groups']['avatars']['directory'];
                $item['avatar'] = upload_picture_to_dir($directory);
            }
            $item['id'] = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_NUMBER_INT);
            $item['nom'] = filter_input(INPUT_POST, 'nom',FILTER_SANITIZE_STRING);
            $item['description'] = filter_input(INPUT_POST, 'description',FILTER_SANITIZE_STRING);
            $item['maximum'] = filter_input(INPUT_POST, 'maximum',FILTER_SANITIZE_STRING);
            $item['connecte'] = (filter_input(INPUT_POST, 'connecte',FILTER_SANITIZE_STRING) == "on")?1:0;
            $item['actif'] = (filter_input(INPUT_POST, 'actif',FILTER_SANITIZE_STRING) == "on")?1:0;
            
            $result = GroupeTable::update($item);
        }
        
        if(isset($_POST['btn_delete']))
        {
            $id = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_NUMBER_INT);
            

            $result = GroupeTable::delete($id);
            
        }
        
        $items = GroupeTable::select('*');
        GroupeViewer::liste($items);
    }
    
    public static function editer()
    {
        $id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
        
        $item = GroupeTable::select_by_id($id);
        if(is_null($item))
        {
            $previous_url = "?c=groupe";
            DefaultViewer::error("Groupe inconnu." , $previous_url);
        }
        else
        {
            GroupeViewer::editer($item);
        }
    }
    
    public static function supprimer()
    {
        $id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
        
        $item = GroupeTable::select_by_id($id);
        if(is_null($item))
        {
            $previous_url = "?c=groupe";
            DefaultViewer::error("Groupe inconnu." , $previous_url);
        }
        else
        {
            GroupeViewer::supprimer($item);
        }
    }
}
?>