# Réalisation d'un mini WeTransfer

C'est un project scolaire a LiveCampus qui consite a réalise une version minimale de WeTransfer en php, puis le but était apprendre le développement back-end en PHP.

## SOMMAIRE

- [Détails du projet](#DETAILS-DU-PROJET)
- [Auteurs](#AUTEURS)
- [Inscription](#INSCRIPTION)
- [Connexion](#CONNEXION)
- [Envoyer](#ENVOYER-UN-FICHIER)
- [Récupérer un fichier](#RECUPERER-UN-FICHIER)
- [Supprimer un fichier](#SUPPRIMER-UN-FICHIER)
- [Modifier son profil](#MODIFIER-SON-PROFIL)

## DETAILS DU PROJET
* Nom : OuiTransfer
* Description : Réalisation d'un mini WeTransfer
* Date de début : 27/02/2024
* Date de fin : 03/02/2024
* Langages utilisés : PHP, HTML, CSS, tailwindcss
* Outils utilisés : Visual Studio Code, GitHub, WampServer

## AUTEURS

- [@YvanneROSAT](https://github.com/YvanneROSAT)
- [@AboubakrZENNIR](https://github.com/Aboubakr67)
- [@KevinLAFONTA](https://github.com/KLAFONTA)
- [@Stanley](https://github.com/Stan97x)

## INSCRIPTION

L'inscription de l'utilisateur est obligatoire. Le site permettant un stockage des fichiers ainsi qu'un partage personnalisé.


## CONNEXION

Une fois connecté, vous avez accès à l'ensemble des fonctionnalités du site, à savoir :

- L'envoi de fichier à un autre utilisateur
- Le stockage des fichiers
- La modification de vos informations personnelles

Jeu de données :

- jean@gmail.com MDP : 123456
- Louis@Pignion.fr MDP : yCCuThQ^5PiUrmr*saPK
- abo@gmail.com MDP : 1234567

## ENVOYER UN FICHIER

![App Screenshot](https://github.com/YvanneROSAT/TP_oui_transfer/blob/main/assets/image/Envoyer.png?raw=true)

- Le champ Email correspond à l'email de l'utilisateur qui va recevoir le fichier. 

- Il est possible d'envoyer le document à plusieurs destinataires en même temps. (Exemple@mail.com,test@mail.com,...etc)

- Choisir un fichier sur votre machine en local.

- Envoyer le fichier -> Il sera stocké en base de données et sera  disponible au téléchargement.

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
