# Cas d'utilisation

## Maître

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
* Nommer un Scribe

## Juge

## Boureau

## Veilleur

## Scribe

## Utilisateur

**Pré-requis** : *être connecté*

**Description** : Utilisateur normal

**Fonctionallités disponibles** :

* Se déconnecter            (utilisateur::deconnecter)
* Inviter                   (utilisateur::inviter)
* Consulter le profil       (utilisateur::profil_consulter)
* Editer le profil          (utilisateur::profil_editer)
* Télécharger un avatar     (utilisateur::profil_avatar_télécharger)
* Choisir un avatar         (utilisateur::profil_avatar_choisir)
* Editer les paramètres de confidentialité (utilisateur::confidentialite_editer)
* Créer un personnage       (personnage::creer)
* Editer un personnage      (personnage::editer)
* Archiver un personnage    (personnage::archiver)
* Proposer une aventure     (aventure::creer)
* Editer une aventure       (aventure::editer)

# Anonyme

**Pré-requis** : *aucun*

**Description** : Internaute non connecté

**Fonctionallités disponibles** :

* S'inscrire            (utilisateur::creer)
* Se connecter          (utilisateur::connecter)