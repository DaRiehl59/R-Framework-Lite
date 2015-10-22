<?php

class GroupeViewer
{
    public static function liste($groupes)
    {
        global $PARAM;
        
        Viewer::init();
        
        $avatar_directory = $PARAM['groupes']['avatars']['directory'];
        $theme = $PARAM['icons']['theme'];
        
        $max_file_size = file_upload_max_size();
        $max_file_size_str = round($max_file_size/1024/1024) . " Mo";
        
        Viewer::assign('max_file_size_str', $max_file_size_str);
        Viewer::assign('max_file_size', $max_file_size);
        Viewer::assign('avatar_directory', $avatar_directory);
        Viewer::assign('theme', $theme);
        Viewer::assign('groupes', $groupes);
        
        if(Session::get('connected'))
        {
            Viewer::assign('utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }

        Viewer::display('groupe_list.tpl');
    }
    
    public static function editer($groupe)
    {
        global $PARAM;
        
        Viewer::init();
        
        $avatar_directory = $PARAM['groupes']['avatars']['directory'];
        $theme = $PARAM['icons']['theme'];
        
        $max_file_size = file_upload_max_size();
        $max_file_size_str = round($max_file_size/1024/1024) . " Mo";
        
        Viewer::assign('max_file_size_str', $max_file_size_str);
        Viewer::assign('max_file_size', $max_file_size);
        Viewer::assign('avatar_directory', $avatar_directory);
        Viewer::assign('theme', $theme);
        Viewer::assign('groupe', $groupe);
        
        if(Session::get('connected'))
        {
            Viewer::assign('utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }

        Viewer::display('groupe_update.tpl');
    }
}