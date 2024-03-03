# Réalisation d'un mini WeTransfer

C'est un project scolaire a LiveCampus qui consite a réalise une version minimale de WeTransfer en php native, puis le but était apprendre le développement back-end en PHP.

## SOMMAIRE

- [Détails du projet](#DETAILS-DU-PROJET)
- [Auteurs](#AUTEURS)
- [Script BDD](#BDD)
- [Inscription](#INSCRIPTION)
- [Connexion](#CONNEXION)
- [Envoyer](#ENVOYER-UN-FICHIER)
- [Récupérer un fichier](#RECUPERER-UN-FICHIER)
- [Supprimer un fichier](#SUPPRIMER-UN-FICHIER)
- [Modifier son profil](#MODIFIER-SON-PROFIL)

## DETAILS DU PROJET

- Nom : OuiTransfer
- Description : Réalisation d'un mini WeTransfer
- Date de début : 27/02/2024
- Date de fin : 03/02/2024
- Langages utilisés : PHP, HTML, CSS, Bootstrap
- Outils utilisés : Visual Studio Code, GitHub, WampServer

## AUTEURS

- [@YvanneROSAT](https://github.com/YvanneROSAT)
- [@AboubakrZENNIR](https://github.com/Aboubakr67)
- [@KevinLAFONTA](https://github.com/KLAFONTA)
- [@Stanley](https://github.com/Stan97x)

## Script BDD

## Table Utilisateurs

La table Users stocke des informations sur les utilisateurs enregistrés.

### Champs

- `ID` : Identifiant unique pour chaque utilisateur.
- `nom` : Nom de l'utilisateur.
- `email` : Adresse e-mail de l'utilisateur.
- `password_user` : Mot de passe de l'utilisateur.

## Table Fichiers

La table Fichiers stocke des informations sur les fichiers téléchargés par les utilisateurs.

### Champs

- `ID` : Identifiant unique pour chaque fichier.
- `nom_fichier` : Nom du fichier.
- `nom_fichier_cryptee` : Nom du fichier crypté.
- `id_user` : Identifiant de l'utilisateur qui a téléchargé le fichier.
- `nombre_telechargement` : Nombre de téléchargements pour le fichier.

### Clé étrangère

- `id_user` : Référence le champ ID dans la table Users.

## Table Partage

La table Partage stocke des informations sur le partage de fichiers entre utilisateurs.

### Champs

- `ID` : Identifiant unique pour chaque entrée de partage.
- `id_fichier` : Identifiant du fichier partagé.
- `id_utilisateur_partage` : Identifiant de l'utilisateur qui partage le fichier.
- `id_user_autorisee` : Identifiant de l'utilisateur autorisé à accéder au fichier partagé.

### Clés étrangères

- `id_fichier` : Référence le champ ID dans la table Fichiers.
- `id_utilisateur_partage` : Référence le champ ID dans la table Users.
- `id_user_autorisee` : Référence le champ ID dans la table Users.

## INSCRIPTION

L'inscription de l'utilisateur est obligatoire. Le site permettant un stockage des fichiers ainsi qu'un partage personnalisé.

## CONNEXION

Une fois connecté, vous avez accès à l'ensemble des fonctionnalités du site, à savoir :

- L'envoi de fichier à un autre utilisateur
- Le stockage des fichiers
- La modification de vos informations personnelles

Jeu de données :

- jean@gmail.com MDP : 123456
- Louis@Pignion.fr MDP : yCCuThQ^5PiUrmr\*saPK
- abo@gmail.com MDP : 1234567

## ENVOYER UN FICHIER

![App Screenshot](https://github.com/YvanneROSAT/TP_oui_transfer/blob/main/assets/image/Envoyer.png?raw=true)

- Le champ Email correspond à l'email de l'utilisateur qui va recevoir le fichier.

- Il est possible d'envoyer le document à plusieurs destinataires en même temps. (Exemple@mail.com,test@mail.com,...etc)

- Choisir un fichier sur votre machine en local.

- Envoyer le fichier -> Il sera stocké en base de données et sera disponible au téléchargement.

## RECUPERER UN FICHIER

Tous les fichiers qui vous ont été partagés seront disponibles sur votre espace "Dashboard"

Il suffit de cliquer sur télécharger pour le récupérer.

## SUPPRIMER UN FICHIER

Tous les fichiers qui ont été envoyés sont disponibles sur votre espace "Dashboard".

Il est possible de consulter le nombre de téléchargement ainsi que de supprimer le fichier de la base de données. Il ne sera plus proposé au téléchargement. Cette action est irréversible.

## MODIFIER SON PROFIL

![App Screenshot](https://github.com/YvanneROSAT/TP_oui_transfer/blob/main/assets/image/Profil.png?raw=true)

Il est possible dans cette section de mettre à jour :

- Le nom
- L'email
- Le mot de passe
