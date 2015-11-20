<?php

class PersonnageViewer
{
    public static function read($items, $utilisateurs, $id_utilisateur, $univers, $id_univers, $races)
    {
        global $PARAM;
        
        Viewer::init();
        
        Viewer::assign('items', $items);
        Viewer::assign('utilisateurs', $utilisateurs);
        Viewer::assign('id_utilisateur', $id_utilisateur);
        Viewer::assign('univers', $univers);
        Viewer::assign('id_univers', $id_univers);
        Viewer::assign('races', $races);
        
        $avatar_directory = $PARAM['personnages']['avatars']['directory'];
        Viewer::assign('avatar_directory', $avatar_directory);
        
        $theme = $PARAM['icons']['theme'];
        Viewer::assign('theme', $theme);
        
        $max_file_size = file_upload_max_size();
        Viewer::assign('max_file_size', $max_file_size);
        
        $max_file_size_str = round($max_file_size/1024/1024) . " Mo";
        Viewer::assign('max_file_size_str', $max_file_size_str);
        
        if(Session::get('connected'))
        {
            Viewer::assign('session_utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }

        Viewer::display('personnage_read.tpl');
    }
    
    public static function update($item, $utilisateurs, $univers, $id_univers, $races)
    {
        global $PARAM;
        
        Viewer::init();
        
        Viewer::assign('item', $item);
        Viewer::assign('utilisateurs', $utilisateurs);
        Viewer::assign('univers', $univers);
        Viewer::assign('id_univers', $id_univers);
        Viewer::assign('races', $races);
        
        $avatar_directory = $PARAM['personnages']['avatars']['directory'];
        Viewer::assign('avatar_directory', $avatar_directory);
        
        $theme = $PARAM['icons']['theme'];
        Viewer::assign('theme', $theme);
        
        $max_file_size = file_upload_max_size();
        Viewer::assign('max_file_size', $max_file_size);
        
        $max_file_size_str = round($max_file_size/1024/1024) . " Mo";
        Viewer::assign('max_file_size_str', $max_file_size_str);
        
        if(Session::get('connected'))
        {
            Viewer::assign('session_utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }

        Viewer::display('personnage_update.tpl');
    }
    
    public static function delete($item, $utilisateurs, $univers, $races)
    {
        global $PARAM;
        
        Viewer::init();
        
        Viewer::assign('item', $item);
        Viewer::assign('utilisateurs', $utilisateurs);
        Viewer::assign('univers', $univers);
        Viewer::assign('races', $races);
        
        $avatar_directory = $PARAM['personnages']['avatars']['directory'];
        Viewer::assign('avatar_directory', $avatar_directory);
        
        $theme = $PARAM['icons']['theme'];
        Viewer::assign('theme', $theme);
        
        if(Session::get('connected'))
        {
            Viewer::assign('session_utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }

        Viewer::display('personnage_delete.tpl');
    }
}