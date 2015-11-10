<?php

class PersonnageViewer
{
    public static function read($items)
    {
        global $PARAM;
        
        Viewer::init();
        
        Viewer::assign('items', $items);
        
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
    
    public static function update($item)
    {
        global $PARAM;
        
        Viewer::init();
        
        Viewer::assign('item', $item);
        
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
    
    public static function delete($item)
    {
        global $PARAM;
        
        Viewer::init();
        
        Viewer::assign('item', $item);
        
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