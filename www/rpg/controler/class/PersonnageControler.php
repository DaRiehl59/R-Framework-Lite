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
require_once 'model/table/RaceTable.php';
require_once 'model/table/UniversTable.php';

require_once 'view/class/PersonnageViewer.php';

class PersonnageControler {
    public static function read()
    {
        global $PARAM;
        
        if(isset($_POST['btn_ajouter']))
        {
            $item['avatar'] = null;
            if(!empty($_FILES['userfile']['name']))
            {
                $directory = $PARAM['personnages']['avatars']['directory'];
                $item['avatar'] = upload_picture_to_dir($directory);
            }
            $item['nom'] = filter_input(INPUT_POST, 'nom',FILTER_SANITIZE_STRING);
            $item['description'] = filter_input(INPUT_POST, 'description',FILTER_SANITIZE_STRING);
            $item['actif'] = (filter_input(INPUT_POST, 'actif',FILTER_SANITIZE_STRING) == "on")?1:0;
            $item['id_race'] = filter_input(INPUT_POST, 'id_race',FILTER_SANITIZE_NUMBER_INT);
            $item['id_univers'] = filter_input(INPUT_POST, 'id_univers',FILTER_SANITIZE_NUMBER_INT);
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
            $item['description'] = filter_input(INPUT_POST, 'description',FILTER_SANITIZE_STRING);
            $item['actif'] = (filter_input(INPUT_POST, 'actif',FILTER_SANITIZE_STRING) == "on")?1:0;
            $item['id_race'] = filter_input(INPUT_POST, 'id_race',FILTER_SANITIZE_NUMBER_INT);
            $item['id_univers'] = filter_input(INPUT_POST, 'id_univers',FILTER_SANITIZE_NUMBER_INT);
            $item['id_utilisateur'] = Session::get('utilisateur')['id'];
            
            $result = PersonnageTable::update($item);
        }
        
        if(isset($_POST['btn_delete']))
        {
            $id = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_NUMBER_INT);
            
            $result = PersonnageTable::delete($id);
        }
        
        $items = PersonnageTable::select('*');
        
        $utilisateurs = array();
        $items2 = UtilisateurTable::select('*');
        foreach($items2 as $item2)
        {
            $utilisateurs[$item2->id] = $item2->nom;
        }
        if(Session::get('connected'))
        {
            $id_utilisateur = Session::get('utilisateur')['id'];
        }
        else
        {
            $id_utilisateur = null;
        }
        
        $univers = array();
        $items2 = UniversTable::select('*');
        $univers[''] = 'choisir un univers';
        foreach($items2 as $item2)
        {
            if($item2->actif)
            {
                $univers[$item2->id] = $item2->nom;
            }
        }

        $races = array();
        if(isset($_GET['id_univers']))
        {
            $id_univers = filter_input(INPUT_GET, 'id_univers',FILTER_SANITIZE_NUMBER_INT);
            $items2 = RaceTable::select_by_id_univers($id_univers);
            foreach($items2 as $item2)
            {
                if($item2->actif)
                {
                    $races[$item2->id] = $item2->nom;
                }
            }
        }
        else
        {
            $id_univers = null;
        }
        PersonnageViewer::read($items, $utilisateurs, $id_utilisateur, $univers, $id_univers, $races);
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
            $items2 = UtilisateurTable::select('*');
            $utilisateurs = array();
            foreach($items2 as $item2)
            {
                $utilisateurs[$item2->id] = $item2->nom;
            }
            
            $univers = array();
            $items2 = UniversTable::select('*');
            foreach($items2 as $item2)
            {
                if($item2->actif)
                {
                    $univers[$item2->id] = $item2->nom;
                }
            }

            $races = array();
            if(isset($_GET['id_univers']))
            {
                $id_univers = filter_input(INPUT_GET, 'id_univers',FILTER_SANITIZE_NUMBER_INT);
                $items2 = RaceTable::select_by_id_univers($id_univers);
                foreach($items2 as $item2)
                {
                    if($item2->actif)
                    {
                        $races[$item2->id] = $item2->nom;
                    }
                }
            }
            else
            {
                $items2 = RaceTable::select_by_id_univers($item->id_univers);
                foreach($items2 as $item2)
                {
                    if($item2->actif)
                    {
                        $races[$item2->id] = $item2->nom;
                    }
                }
                $id_univers = null;
            }
            
            PersonnageViewer::update($item, $utilisateurs, $univers, $id_univers, $races);
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
            $utilisateurs = array();
            $items2 = UtilisateurTable::select('*');
            foreach($items2 as $item2)
            {
                $utilisateurs[$item2->id] = $item2->nom;
            }
            
            $univers = array();
            $items2 = UniversTable::select('*');
            foreach($items2 as $item2)
            {
                $univers[$item2->id] = $item2->nom;
            }

            $races = array();
            $items2 = RaceTable::select_by_id_univers($item->id_univers);
            foreach($items2 as $item2)
            {
                $races[$item2->id] = $item2->nom;
            }
            PersonnageViewer::delete($item, $utilisateurs, $univers, $races);
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