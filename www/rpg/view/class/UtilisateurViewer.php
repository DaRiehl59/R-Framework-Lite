<?php

class UtilisateurViewer
{
    public static function profil($utilisateur, $confidentialite, $pays)
    {
        Viewer::init();

        Viewer::assign('utilisateur', Session::get('utilisateur'));
        Viewer::assign('personnages', array());
        
        Viewer::assign('utilisateur_profil', $utilisateur);
        Viewer::assign('confidentialite', $confidentialite);
        Viewer::assign('pays', $pays);
        
        Viewer::display('utilisateur_profil.tpl');
    }
}