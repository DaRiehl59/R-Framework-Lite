# Cas d'utilisation


## Hierarchie des Groupes

### Grand Concepteur

**Pré-requis** : *aucun*

**Maximum** : 1 par Serveur (par défaut : *root*)

**Description**

Maître absolu et incontesté des Univers.

**Fonctionallités spécifiques**

* Gérer les Architectes

    * Affecter un veilleur                          (Affecter::grant_architectes)
    * Révoquer un veilleur                          (Affecter::revok_architectes)

* Gérer les Univers                                 (Univers::create)
                                            
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

    * Affecter un Juge                              (Affecter::grant_juges)
    * Révoquer un Juge                              (Affecter::revok_juges)

* Gérer les Scribes

    * Affecter un Scribe                            (Affecter::grant_scribes)
    * Révoquer un Scribe                            (Affecter::revok_scribes)

### Juge(s)

**Pré-requis** : *avoir été Boureau*, *niv XP min*

**Maximum** : 1 par Secteur

**Description**

Impartial, il fait appliquer la loi dans un secteur.
Une fois rendue, sa décision ne peut être contestée.

**Fonctionallités spécifiques**

* Gérer les Bourreaux

    * Affecter un Bourreau                          (Affecter::grant_bourreaux)
    * Révoquer un Bourreau                          (Affecter::revok_bourreaux)

* Gérer les Diplomates

    * Affecter un Diplomate                         (Affecter::grant_diplomates)
    * Révoquer un Diplomate                         (Affecter::revok_diplomates)

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

    * Affecter un veilleur                          (Affecter::grant_veilleurs)
    * Révoquer un veilleur                          (Affecter::revok_veilleurs)

* Gérer les signalements des messages privés

    * Lire les messages privés signalés             (Message::read_signaled)
    * Annuler le signalement d'un message privé     (Message::unsignal)
    * Confirmer le signalement d'un message         (Message::confirm_signal)

* Gérer les signalements des participations

    * Lire les participations signalées             (Participation::read_signaled)
    * Annuler le signalement d'une participation    (Participation::unsignal)
    * Confirmer le signalement d'une participation  (Participation::confirm_signal)


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

* Editer une description de personnage              (Personnage::update_description)


### Utilisateur(s)

**Pré-requis** : *être connecté*

**Maximum** : illimité

**Description**

Utilisateur normal

**Fonctionallités spécifiques**

* Se déconnecter                                    (Utilisateur::disconnect)
* Inviter                                           (Utilisateur::invite)

* Gérer son  Profil

    * Consulter le profil                           (Utilisateur::read_profil)
    * Editer le profil                              (Utilisateur::owner_update_profil)
    * Télécharger un avatar                         (Utilisateur::upload_avatar)
    * Choisir un avatar                             (Utilisateur::select_avatar)

* Editer les paramètres de confidentialité          (Utilisateur::update_confid)

* Gérer ses personnages

    * Créer un personnage                           (Personnage::create)
    * Editer un personnage                          (Personnage::owner_update)
    * Archiver un personnage                        (Personnage::owner_archive)

* Gérer ses aventures

    * Proposer une aventure                         (Aventure::create)
    * Editer une aventure                           (Aventure::update_owner)


* Participer à une aventure                         (Participation::create)

    * Editer une Participation                      (Participation::update_owner)
    * Signaler une participation abusive            (Participation::signal)

* Gérer ses messages privés

    * Envoyer un message privé                      (Message::create)
    * Consulter ces messages                        (Message::read_owner)
    * Effacer un/des messages                       (Message::archive_owner)
    * Signaler un message privé abusif              (Message::signal)


### Anonyme(s)

**Pré-requis** : *aucun*

**Description** : Internaute non connecté

**Fonctionallités disponibles** :

* Se connecter                                  (Utilisateur::connect)
* S'inscrire                                    (Utilisateur::create)
* mot de passe oublié                           (Utilisateur::forgotten_pwd)
