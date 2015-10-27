<?php

$ROUTES=array(
    '' => array(
            ''              => 'DefaultControler::defaultAction',
        ),
    'utilisateur' => array (
            ''              => 'UtilisateurControler::profil',
            'profil'        => 'UtilisateurControler::profil',
            'connexion'     => 'UtilisateurControler::connexion',
            'deconnexion'   => 'UtilisateurControler::deconnexion',
            'inscription'   => 'UtilisateurControler::inscription',
        ),
    'groupe' => array (
            ''              => 'GroupeControler::liste',
            'liste'         => 'GroupeControler::liste',
            'editer'        => 'GroupeControler::editer',
            'supprimer'     => 'GroupeControler::supprimer',
        ),
    'droit' => array (
            ''              => 'DroitControler::liste',
            'liste'         => 'DroitControler::liste',
            'editer'        => 'DroitControler::editer',
            'supprimer'     => 'DroitControler::supprimer',
        ),
    'attribuer' => array (
            ''              => 'AttribuerControler::link',
            'link'          => 'DroitControler::link',
        ),
);
?>