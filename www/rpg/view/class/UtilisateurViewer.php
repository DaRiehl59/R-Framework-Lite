<?php

class UtilisateurViewer
{
    public static function inscription($pays)
    {
        Viewer::init();

        Viewer::assign('pays', $pays);
        
        Viewer::display('utilisateur_inscription.tpl');
    }
    
    public static function profil($utilisateur, $confidentialite, $pays)
    {
        Viewer::init();

        Viewer::assign('utilisateur', $utilisateur);
        Viewer::assign('confidentialite', $confidentialite);
        Viewer::assign('pays', $pays);

        if(Session::get('connected'))
        {
            Viewer::assign('session_utilisateur', Session::get('utilisateur'));
            Viewer::assign('personnages', array());
        }
        
        Viewer::display('utilisateur_profil.tpl');
    }
}