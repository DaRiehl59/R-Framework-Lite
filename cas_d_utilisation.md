# Cas d'utilisation


## Hierarchie des Groupes

### Grand Concepteur

**Pré-requis** : *aucun*

**Maximum** : 1 par Serveur (par défaut : *root*)

**Description**

Maître absolu et incontesté des Univers.

**Fonctionallités spécifiques**

* Gérer les Architectes
* Gérer les Univers
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
* Gérer les Scribes

### Juge(s)

**Pré-requis** : *avoir été Boureau*, *niv XP min*

**Maximum** : 1 par Secteur

**Description**

Impartial, il fait appliquer la loi dans un secteur.
Une fois rendue, sa décision ne peut être contestée.

**Fonctionallités spécifiques**

* Gérer les Bourreaux
* Gérer les Diplomates

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
* Gérer les signalements (message_signal::lire)

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

* Editer une description de personnage (personnage::update_description)

### Utilisateur(s)

**Pré-requis** : *être connecté*

**Maximum** : illimité

**Description**

Utilisateur normal

**Fonctionallités spécifiques**

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

### Anonyme(s)

**Pré-requis** : *aucun*

**Description** : Internaute non connecté

**Fonctionallités disponibles** :

* S'inscrire                 (utilisateur::creer)
* Se connecter               (utilisateur::connecter)