<?php

$ROUTES=array(
    '' => array('' => 'DefaultControler::defaultAction'),
    'utilisateur' => array (
            'connexion' => 'UtilisateurControler::connexion',
            'deconnexion' => 'UtilisateurControler::deconnexion',
            'profil' => 'UtilisateurControler::profil',
        ),
);
?>