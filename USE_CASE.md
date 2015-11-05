# Cas d'utilisation


## Hierarchie des Groupes

### Grand Concepteur

**Pré-requis** : *aucun*

**Maximum** : 1 par Serveur (par défaut : *root*)

**Description**

Maître absolu et incontesté des Univers.

**Fonctionallités spécifiques**

* Gérer les Architectes

    * Affecter un architecte                        (AffecterControler::grant_architectes)
    * Révoquer un architecte                        (AffecterControler::revok_architectes)

* Gérer les Univers                                 (UniversControler::create)
                                            
* Gérer les Groupes
* Gérer les Droits

**Autres Fonctionallités disponibles**

* **toutes les autres fonctionnalités**

### Architecte(s)

**Pré-requis** : *aucun*

**Maximum** : 1 par Univers

**Description**

Maître d'un Univers.

**Fonctionallités spécifiques**

* Gérer les Maîtres de jeu
* Gérer les Régions
* Gérer les Villes

**Autres Fonctionallités disponibles**

* **les fonctionnalités de niveau inférieur**

### Maître(s) de Jeu

**Pré-requis** : *aucun*

**Maximum** : 1 par Secteur

**Description**

Assistant de l'architecte sur le développement RP de son Univers.

**Fonctionallités spécifiques**

* Gérer les Juges

    * Affecter un Juge                              (AffecterControler::grant_juges)
    * Révoquer un Juge                              (AffecterControler::revok_juges)

* Gérer les Scribes

    * Affecter un Scribe                            (AffecterControler::grant_scribes)
    * Révoquer un Scribe                            (AffecterControler::revok_scribes)

### Juge(s)

**Pré-requis** : *avoir été Boureau*, *niv XP min*

**Maximum** : 1 par Secteur

**Description**

Impartial, il fait appliquer la loi dans un secteur.
Une fois rendue, sa décision ne peut être contestée.

**Fonctionallités spécifiques**

* Gérer les Bourreaux

    * Affecter un Bourreau                          (AffecterControler::grant_bourreaux)
    * Révoquer un Bourreau                          (AffecterControler::revok_bourreaux)

* Gérer les Diplomates

    * Affecter un Diplomate                         (AffecterControler::grant_diplomates)
    * Révoquer un Diplomate                         (AffecterControler::revok_diplomates)

### Boureau(x)

**Pré-requis** : *avoir été Diplomate*, *niv XP min*

**Maximum** : 3 par Secteur

**Description**

Mystérieux et solitaire, il applique les sentences prononcées par le juge.

**Fonctionallités spécifiques**

* exécuter (archivage définitif d'un utilisateur + archivage définitif de tous les personnages)
* exiler (archivage définitif d'un personnage)
* emprisonner (banissement provisoirement : blocage de tous les personnages)
* blamer (message public)
* avertir (message privé)

### Diplomate(s)

**Pré-requis** : *avoir été Veilleur*, *niv XP min*

**Maximum** : 5 par Secteur

**Description**

Généreux et volontaire, il est le garant de la paix dans un secteur.
Il s'assure que les conflits peuvent être réglés à l'amiable avant de les porter devant le tribunal.

**Fonctionallités spécifiques**

* Gérer les Veilleurs

    * Affecter un veilleur                          (AffecterControler::grant_veilleurs)
    * Révoquer un veilleur                          (AffecterControler::revok_veilleurs)

* Gérer les signalements d'Utilisateurs

    * Lire le signalement                           (UtilisateurSignalControler::read)
    * Annuler le signalement                        (UtilisateurSignalControler::cancel)
    * Confirmer le signalement                      (UtilisateurSignalControler::confirm)

* Gérer les signalements des Messages Privés

    * Lire le signalement                           (MessageSignalControler::read)
    * Annuler le signalement                        (MessageSignalControler::cancel)
    * Confirmer le signalement                      (MessageSignalControler::confirm)

* Gérer les signalements des Messages Privés RP

    * Lire le signalement                           (MessageRPSignalControler::read)
    * Annuler le signalement                        (MessageRPSignalControler::cancel)
    * Confirmer le signalement                      (MessageRPSignalControler::confirm)

* Gérer les signalements des Interventions

    * Lire le signalement                           (InterventionSignalControler::read)
    * Annuler le signalement                        (InterventionSignalControler::cancel)
    * Confirmer le signalement                      (InterventionSignalControler::confirm)


### Veilleur(s)

**Pré-requis** : *niv XP min*

**Maximum** : 10 par Secteur

**Description**

Attentif, discret, honnête, il surveille le déroulement des aventures
et le comportement RP / HRP des personnages / utilisateurs.
En cas d'infraction aux règlements du site, du secteur, ou de l'univers
le veilleur fait un signalement objectif et précis de l'incident.

**Fonctionallités spécifiques**

* Signaler un comportement à un diplomate


### Scribe(s)

**Pré-requis** : *niv XP min*

**Maximum** : 20 par Secteur

**Description**

Irréprochable dans son orthographe, et sa grammaire, il est le garant du respect de la langue Française.

**Fonctionallités spécifiques**

* Editer une description de personnage              (PersonnageControler::update_description)


### Utilisateur(s)

**Pré-requis** : *être connecté*

**Maximum** : illimité

**Description**

Utilisateur normal

**Fonctionallités spécifiques**

* Se déconnecter                                    (UtilisateurControler::disconnect)
* Inviter                                           (UtilisateurControler::invite)

* Gérer son  Profil

    * Consulter son profil                          (UtilisateurControler::read_owner_profil)
    * Editer son profil                             (UtilisateurControler::update_owner_profil)
    * Télécharger un avatar                         (UtilisateurControler::upload_avatar)
    * Choisir un avatar                             (UtilisateurControler::select_avatar)

* Gérer ses paramètres de confidentialité

    * Editer ses paramètres de confidentialité      (UtilisateurControler::update_confid)

* Gérer ses contacts

    * Consulter la liste des utilisateurs           (UtilisateurControler::read_list)
    * Consulter le profil des utilisateurs          (UtilisateurControler::read_profil)
    * Ajouter un utilisateur à sa liste de contats  (UtilisateurControler::add_contact)
    * Retirer un utilisateur de sa liste de contats (UtilisateurControler::remove_contact)
    * Bloquer un contact                            (UtilisateurControler::block_contact)
    * Signaler un utilisateur malveillant           (UtilisateurSignalControler::create)

* Gérer ses messages privés

    * Envoyer un message privé                      (MessageControler::create)
    * Consulter ces messages                        (MessageControler::read_owner)
    * Effacer un/des messages                       (MessageControler::archive_owner)
    * Signaler un message privé abusif              (MessageSignalControler::create)

* Gérer ses personnages

    * Créer un personnage                           (PersonnageControler::create)
    * Editer un personnage                          (PersonnageControler::update_owner)
    * Archiver un personnage                        (PersonnageControler::archive_owner)

* Intervenir dans une aventure

    * Publier une nouvelle Intervention             (InterventionControler::create)
    * Effectuer une Action                          (InterventionControler::use_action)
    * Editer une Intervention                       (InterventionControler::update_owner)
    * Signaler une Intervention abusive             (InterventionSignalControler::create)

* Gérer ses messages privés RP

    * Envoyer un message privé RP                   (MessageRPControler::create)
    * Consulter ces messages RP                     (MessageRPControler::read_owner)
    * Effacer un/des messages RP                    (MessageRPControler::archive_owner)
    * Signaler un message privé RP abusif           (MessageRPSignalControler::create)

* Gérer ses aventures

    * Proposer une aventure                         (AventureControler::create)
    * Editer une aventure                           (AventureControler::update_owner)
    * Annuler la proposition d'une aventure         (AventureControler::archive_owner)
    * Clore une aventure                            (AventureControler::close_owner)

### Anonyme(s)

**Pré-requis** : *aucun*

**Description** : Internaute non connecté

**Fonctionallités disponibles** :

* Se connecter                                      (UtilisateurControler::connect)
* S'inscrire                                        (UtilisateurControler::create)
* mot de passe oublié                               (UtilisateurControler::forgotten)
