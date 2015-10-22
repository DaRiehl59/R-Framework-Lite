# Cas d'utilisation

## Architecte

**Pré-requis** : 1 seul utilisateur (par défaut : *root*)

**Description** : Utilisateur normal

**Fonctionallités disponibles** :

* Nommer un Maître de jeu
* Destituer un Maître de jeu
* **toutes les autres fonctionnalités**

## Maître de Jeu

* Nommer un Juge
* Nommer un Bourreau
* Nommer un Veilleur
* Nommer un Diplomate
* Nommer un Scribe

## Juge

## Boureau

## Veilleur

## Diplomate

* Consulter les signalements (message_signal::lire)

## Scribe

* Editer une description de personnage (personnage::editer_description)

## Utilisateur

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

## Anonyme

**Pré-requis** : *aucun*

**Description** : Internaute non connecté

**Fonctionallités disponibles** :

* S'inscrire                 (utilisateur::creer)
* Se connecter               (utilisateur::connecter)