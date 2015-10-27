<?php

$ROUTES=array(
    '' => array(
            ''              => 'DefaultControler::defaultAction',
        ),
    'utilisateur' => array (
            'connexion'     => 'UtilisateurControler::connexion',
            'deconnexion'   => 'UtilisateurControler::deconnexion',
            'inscription'   => 'UtilisateurControler::inscription',
            'profil'        => 'UtilisateurControler::profil',
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
            'link'         => 'DroitControler::link',
        ),
);
?>