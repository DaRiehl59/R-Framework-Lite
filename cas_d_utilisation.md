# Cas d'utilisation


## Hierarchie des Groupes

### Grand Concepteur

**Pré-requis** : *aucun*

**Maximum** : 1 seul utilisateur par serveur (par défaut : *root*)

**Description** : Utilisateur qui a tous les pouvoirs

**Fonctionallités spécifiques** :

* Gérer les Architectes
* Gérer les Univers
* Gérer les Groupes
* Gérer les Droits

**Autres Fonctionallités disponibles** :

* **toutes les autres fonctionnalités**

### Architecte

**Pré-requis** : *aucun*

**Maximum** : 1 utilisateur par Univers

**Description** : Gérant de l'univers

**Fonctionallités spécifiques** :

* Gérer les Maîtres de jeu
* Gérer les Régions
* Gérer les Villes

**Autres Fonctionallités disponibles** :

* **les fonctionnalités de niveau inférieur**

### Maître de Jeu

* Gérer les Juges
* Gérer les Scribes

### Juge

* Gérer les Bourreaux
* Gérer les Diplomates

### Boureau

* Appliquer une sentence prononcée par le juge

    * bannir définitivement
    * bannir provisoirement
    * blamer
    * avertir

### Diplomate

* Gérer les Veilleurs
* Gérer les signalements (message_signal::lire)

### Veilleur

* Signaler un comportement à un diplomate

### Scribe

* Editer une description de personnage (personnage::update_description)

### Utilisateur

**Pré-requis** : *être connecté*

**Description** : Utilisateur normal

**Fonctionallités disponibles** :

* Se déconnecter             (utilisateur::deconnect)
* Inviter                    (utilisateur::invite)
* Consulter le profil        (utilisateur::read_profil)
* Editer le profil           (utilisateur::update_profil)
* Télécharger un avatar      (utilisateur::upload_avatar)
* Choisir un avatar          (utilisateur::select_avatar)
* Editer les paramètres de confidentialité (utilisateur::update_confid)
* Créer un personnage        (personnage::create)
* Editer un personnage       (personnage::update)
* Archiver un personnage     (personnage::archiv)
* Proposer une aventure      (aventure::create)
* Editer une aventure        (aventure::update)
* Participer à une aventure  (participation::create)
* Signaler une participation abusive (participation::signal)
* Envoyer un message privé à un autre utilisateur (message::create)
* Consulter ces messages     (message::read)
* Effacer un/des messages    (message::archiv)
* Signaler un message abusif (message::signal)

### Anonyme

**Pré-requis** : *aucun*

**Description** : Internaute non connecté

**Fonctionallités disponibles** :

* S'inscrire                 (utilisateur::creer)
* Se connecter               (utilisateur::connecter)