# Schéma Relationnel



## Gestion des Utilisateurs

**Utilisateur** (id, prenom, nom, email, identifiant, motdepasse, pseudonyme, avatar, actif)

* **clé primaire** : id


**Groupe** (id, nom)

* **clé primaire** : id

**Droit** (id, nom)

* **clé primaire** : id


**_affecter** (id_utilisateur, id_groupe, date_heure)

* **clé primaire** : id_utilisateur, id_groupe
* *clé étrangère* : id_utilisateur en référence à **Utilisateur**(id)
* *clé étrangère* : id_groupe en référence à **Groupe**(id)


**_attribuer** (id_groupe, id_droit)

* **clé primaire** : id_groupe, id_droit
* *clé étrangère* : id_groupe en référence à **Groupe**(id)
* *clé étrangère* : id_droit en référence à **Droit**(id)



## Gestion des Personnages

**Personnage** (id, nom, description, id_utilisateur, id_monde)

* **clé primaire** : id
* *clé étrangère* : id_utilisateur en référence à **Utilisateur**(id)
* *clé étrangère* : id_monde en référence à **Monde**(id)


**Histoire** (id, titre, contenu, id_personnage)

* **clé primaire** : id
* *clé étrangère* : id_personnage en référence à **Personnage**(id)


**Classe** (id, nom)

* **clé primaire** : id


**Race** (id, nom)

* **clé primaire** : id


**Competence** (id, nom)

* **clé primaire** : id


**_heriter** (id_personnage, id_race)

* **clé primaire** : id_personnage, id_race
* *clé étrangère* : id_personnage en référence à **Personnage**(id)
* *clé étrangère* : id_race en référence à **Race**(id)


**_exercer** (id_personnage, id_classe)

* **clé primaire** : id_personnage, id_classe
* *clé étrangère* : id_personnage en référence à **Personnage**(id)
* *clé étrangère* : id_classe en référence à **Classe**(id)


**_reserver** (id_classe, id_race)

* **clé primaire** : id_classe, id_race
* *clé étrangère* : id_classe en référence à **Classe**(id)
* *clé étrangère* : id_race en référence à **Race**(id)


**_donner** (id_classe, quantite, id_competence)

* **clé primaire** : id_classe, id_competence
* *clé étrangère* : id_classe en référence à **Classe**(id)
* *clé étrangère* : id_competence en référence à **Competence**(id)


**_accorder** (id_race, quantite, id_competence)

* **clé primaire** : id_race, id_competence
* *clé étrangère* : id_race en référence à **Race**(id)
* *clé étrangère* : id_competence en référence à **Competence**(id)

**_octroyer** (id_classe, id_droit)

* **clé primaire** : id_classe, id_droit
* *clé étrangère* : id_classe en référence à **Classe**(id)
* *clé étrangère* : id_droit en référence à **Droit**(id)


## Gestion des Contacts

**Contact** (id_utilisateur, id_contact)

* **clé primaire** : id_utilisateur, id_contact
* *clé étrangère* : id_utilisateur en référence à **Utilisateur**(id)
* *clé étrangère* : id_contact en référence à **Utilisateur**(id)


**Message** (id, date_heure, titre, contenu, lu, important, missive, id_expediteur, id_destinataire)

* **clé primaire** : id
* *clé étrangère* : id_expediteur en référence à **Personnage**(id)
* *clé étrangère* : id_destinataire en référence à **Personnage**(id)



## Gestion des Mondes (monde, royaume, lieu)

**Monde** (id, nom, description, avatar, carte)

* **clé primaire** : id


**Royaume** (id, nom, description, avatar, carte, pos_x, pos_y, id_monde)

* **clé primaire** : id
* *clé étrangère* : id_monde en référence à **Monde**(id)

**Lieu** (id, nom, avatar, carte, pos_x, pos_y, id_royaume)

* **clé primaire** : id
* *clé étrangère* : id_royaume en référence à **Royaume**(id)



## Gestion des Inventaires (inventaire, objet)

**Type_Objet** (id, nom)

* **clé primaire** : id


**Objet** (id, nom, description, avatar, id_type_objet)

* **clé primaire** : id


**_conferer** (id_objet, id_competence, quantite)

* **clé primaire** : id_objet, id_competence
* *clé étrangère* : id_objet en référence à **Objet**(id)
* *clé étrangère* : id_competence en référence à **Competence**(id)


**Inventaire** (id_utilisateur, id_objet, quantite)

* **clé primaire** : id_utilisateur, id_objet
* *clé étrangère* : id_utilisateur en référence à **Utilisateur**(id)
* *clé étrangère* : id_objet en référence à **Objet**(id)


**Position_Equipement** (id, libele)

* **clé primaire** : id


**Equipement** (id_utilisateur, id_objet, id_position)

* **clé primaire** : id_utilisateur, id_objet
* *clé étrangère* : id_utilisateur en référence à **Utilisateur**(id)
* *clé étrangère* : id_objet en référence à **Objet**(id)
* *clé étrangère* : id_position en référence à **Position_Equipement**(id)



## Gestion des Aventures (aventure, participation)

**Aventure** (id, titre, description, valide, debut, fin)

* **clé primaire** : id


**_gagner** (id_aventure, id_objet, quantite)

* **clé primaire** : id_aventure, id_competence
* *clé étrangère* : id_aventure en référence à **Aventure**(id)
* *clé étrangère* : id_competence en référence à **Competence**(id)


**Commentaire** (id, contenu, id_aventure, id_personnage)

* **clé primaire** : id
* *clé étrangère* : id_aventure en référence à **Aventure**(id)
* *clé étrangère* : id_personnage en référence à **Personnage**(id)

=> COMMENTAIRE ADMINISTRATIF AVANT VALIDATION

**Participation** (id, contenu, id_aventure, id_personnage)

* **clé primaire** : id
* *clé étrangère* : id_aventure en référence à **Aventure**(id)
* *clé étrangère* : id_personnage en référence à **Personnage**(id)



## Gestion des Clans (clan)

**Clan** (id, nom, avatar, cadre, id_monde, id_personnage)

* **clé primaire** : id
* *clé étrangère* : id_monde en référence à **Monde**(id)
* *clé étrangère* : id_personnage en référence à **Personnage**(id)


**_participer** (id_personnage, id_clan, debut)

* **clé primaire** : id_personnage, id_clan
* *clé étrangère* : id_personnage en référence à **Personnage**(id)
* *clé étrangère* : id_clan en référence à **Clan**(id)
