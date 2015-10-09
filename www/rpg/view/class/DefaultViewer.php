<?php

class DefaultViewer
{
    public static function defaultAction()
    {
        global $PARAM;
        
        Viewer::init();

        Viewer::assign("application_name", $PARAM['application']['name']);
        
        if(Session::get('connected'))
        {
            Viewer::assign('utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }
        
        Viewer::display('defaultViewer_defaultAction.tpl');
    }
    
    public static function error($message)
    {
        Viewer::init();

        if(Session::get('connected'))
        {
            Viewer::assign('utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }

        Viewer::error($message);
        
        Viewer::display('empty.tpl');
    }
}