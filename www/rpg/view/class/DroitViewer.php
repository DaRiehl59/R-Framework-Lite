<?php

class DroitViewer
{
    public static function liste($items)
    {
        global $PARAM;
        
        Viewer::init();
        
        $theme = $PARAM['icons']['theme'];
        
        Viewer::assign('theme', $theme);
        Viewer::assign('items', $items);
        
        if(Session::get('connected'))
        {
            Viewer::assign('session_utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }

        Viewer::display('droit_list.tpl');
    }
    
    public static function editer($item)
    {
        global $PARAM;
        
        Viewer::init();
        
        $theme = $PARAM['icons']['theme'];
        
        Viewer::assign('theme', $theme);
        Viewer::assign('item', $item);
        
        if(Session::get('connected'))
        {
            Viewer::assign('session_utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }

        Viewer::display('droit_update.tpl');
    }
    
    public static function supprimer($item)
    {
        global $PARAM;
        
        Viewer::init();
        
        $theme = $PARAM['icons']['theme'];
        
        Viewer::assign('theme', $theme);
        Viewer::assign('item', $item);
        
        if(Session::get('connected'))
        {
            Viewer::assign('session_utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }

        Viewer::display('droit_delete.tpl');
    }
}