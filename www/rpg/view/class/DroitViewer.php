<?php

class DroitViewer
{
    public static function read($items)
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

        Viewer::display('droit_read.tpl');
    }
    
    public static function update($item)
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
    
    public static function delete($item)
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