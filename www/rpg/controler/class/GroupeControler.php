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
        
        if(isset($_POST['btn_ajouter']))
        {
            $item['avatar'] = null;
            if(isset($_FILES['userfile']))
            {
                $directory = $PARAM['groupes']['avatars']['directory'];
                $item['avatar'] = upload_picture_to_dir($directory);
            }
            $item['nom'] = filter_input(INPUT_POST, 'nom',FILTER_SANITIZE_STRING);
            $item['description'] = filter_input(INPUT_POST, 'description',FILTER_SANITIZE_STRING);
            $item['maximum'] = filter_input(INPUT_POST, 'maximum',FILTER_SANITIZE_STRING);
            
            $result = GroupeTable::insert($item);
        }
        
        if(isset($_POST['btn_update']))
        {
            if(!empty($_FILES['userfile']['name']))
            {
                $directory = $PARAM['groupes']['avatars']['directory'];
                $item['avatar'] = upload_picture_to_dir($directory);
            }
            $item['nom'] = filter_input(INPUT_POST, 'nom',FILTER_SANITIZE_STRING);
            $item['description'] = filter_input(INPUT_POST, 'description',FILTER_SANITIZE_STRING);
            $item['maximum'] = filter_input(INPUT_POST, 'maximum',FILTER_SANITIZE_STRING);
            
            $result = GroupeTable::update($item);
        }
        
        if(isset($_POST['btn_delete']))
        {
            $id = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_NUMBER_INT);
            

            $result = GroupeTable::delete($id);
            
        }
        
        $groupes = GroupeTable::select('*');
        GroupeViewer::liste($groupes);
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