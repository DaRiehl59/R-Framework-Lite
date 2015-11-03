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
            Viewer::assign('session_utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }
        
        Viewer::display('defaultViewer_defaultAction.tpl');
    }
    
    public static function error($message, $previous_url=".")
    {
        Viewer::init();

        if(Session::get('connected'))
        {
            Viewer::assign('session_utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }

        Viewer::error($message, $previous_url);
        
        Viewer::display('empty.tpl');
    }
    
    public static function confirm($message)
    {
        Viewer::init();

        if(Session::get('connected'))
        {
            Viewer::assign('session_utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }
        
        Viewer::assign('message', $message);

        Viewer::confirm($message);
        Viewer::display('empty.tpl');
    }
}