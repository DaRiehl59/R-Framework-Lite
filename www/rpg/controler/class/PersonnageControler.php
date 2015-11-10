<?php
/**
 * Classe de controle des personnages
 *
 * @filesource controler/class/PersonnageControler.php
 * @author David RIEHL <david.riehl@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, D. [R]IEHL
 */

require_once 'kernel/Database.php';
require_once 'model/table/PersonnageTable.php';
require_once 'view/class/PersonnageViewer.php';

class PersonnageControler {
    public static function read()
    {
        global $PARAM;
        
        if(isset($_POST['btn_ajouter']))
        {
            $item['avatar'] = null;
            if(isset($_FILES['userfile']))
            {
                $directory = $PARAM['personnages']['avatars']['directory'];
                $item['avatar'] = upload_picture_to_dir($directory);
            }
            $item['nom'] = filter_input(INPUT_POST, 'nom',FILTER_SANITIZE_STRING);
            $item['actif'] = (filter_input(INPUT_POST, 'actif',FILTER_SANITIZE_STRING) == "on")?1:0;
            $item['id_utilisateur'] = Session::get('utilisateur')['id'];
            
            $result = PersonnageTable::insert($item);
        }
        
        if(isset($_POST['btn_update']))
        {
            if(!empty($_FILES['userfile']['name']))
            {
                $directory = $PARAM['personnages']['avatars']['directory'];
                $item['avatar'] = upload_picture_to_dir($directory);
            }
            $item['id'] = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_NUMBER_INT);
            $item['nom'] = filter_input(INPUT_POST, 'nom',FILTER_SANITIZE_STRING);
            $item['actif'] = (filter_input(INPUT_POST, 'actif',FILTER_SANITIZE_STRING) == "on")?1:0;
            $item['id_utilisateur'] = Session::get('utilisateur')['id'];
            
            $result = PersonnageTable::update($item);
        }
        
        if(isset($_POST['btn_delete']))
        {
            $id = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_NUMBER_INT);
            

            $result = PersonnageTable::delete($id);
            
        }
        
        $items = PersonnageTable::select('*');
        PersonnageViewer::read($items);
    }
    
    public static function update()
    {
        $id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
        
        $item = PersonnageTable::select_by_id($id);
        if(is_null($item))
        {
            $previous_url = "?c=personnage";
            DefaultViewer::error("Personnage inconnu." , $previous_url);
        }
        else
        {
            PersonnageViewer::update($item);
        }
    }
    
    public static function delete()
    {
        $id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
        
        $item = PersonnageTable::select_by_id($id);
        if(is_null($item))
        {
            $previous_url = "?c=personnage";
            DefaultViewer::error("Personnage inconnu." , $previous_url);
        }
        else
        {
            PersonnageViewer::delete($item);
        }
    }
    
    public static function active()
    {
        $id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
        
        $object = PersonnageTable::select_by_id($id);
        if(is_null($object))
        {
            $previous_url = "?c=personnage";
            DefaultViewer::error("Personnage inconnu." , $previous_url);
        }
        else
        {
            $item = get_object_vars($object);
            $item['actif'] = 1;
            
            $result = PersonnageTable::update($item);
            self::read();
        }
    }
    
    public static function desactive()
    {
        $id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
        
        $object = PersonnageTable::select_by_id($id);
        if(is_null($object))
        {
            $previous_url = "?c=personnage";
            DefaultViewer::error("Personnage inconnu." , $previous_url);
        }
        else
        {
            $item = get_object_vars($object);
            $item['actif'] = 0;
            
            $result = PersonnageTable::update($item);
            self::read();
        }
    }
}
?>