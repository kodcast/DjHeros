# DJheros 🎧

**DJheros** est une application simple et intuitive qui permet aux utilisateurs de soumettre des propositions de musique et aux DJ de les gérer en les validant, refusant ou supprimant. Conçue pour faciliter la gestion des demandes de musique lors d'événements (soirées, festivals, etc.), cette application est un outil pratique pour les DJ et leur public.

----------

## Fonctionnalités 🚀

-   **Soumettre une proposition de musique** : Les utilisateurs peuvent proposer une chanson en indiquant le nom de l'artiste et le titre.
    
-   **Gestion des propositions par le DJ** : Le DJ peut accepter, refuser ou supprimer les propositions soumises.
    
-   **Interface simple et claire** : L'application est développée en PHP et utilise un fichier JSON pour stocker les propositions de manière légère et efficace.
    

----------

## Prérequis ⚙️

Pour exécuter cette application, assurez-vous d'avoir les éléments suivants :

-   Un serveur web avec **PHP (version 7.4 ou supérieure)**.
    
-   Un accès en écriture au dossier d'installation de l'application, car le fichier `propositions.json` est utilisé pour stocker les propositions.
    

----------

## Installation 📥

1.  Clonez le projet ou téléchargez les fichiers sources :
    
    git clone https://github.com/votre-utilisateur/djheros.git
    
2.  Placez les fichiers sur votre serveur web (par exemple, dans le répertoire `htdocs` ou un répertoire accessible via un serveur local).
    
3.  Assurez-vous que le fichier `propositions.json` est présent dans le même répertoire que `index.php` et `validation.php`. Si ce fichier n'existe pas, il sera créé automatiquement.
    
4.  Réglez les droits du fichier `propositions.json` pour permettre au serveur web de le lire et de l'écrire :
    
    chown www-data:www-data propositions.json
    chmod 664 propositions.json
    

----------

## Utilisation 🎶

1.  Accédez à la page d'accueil `index.php` pour soumettre des propositions de musique.
    
2.  Les propositions soumises apparaîtront dans la section **"Propositions en attente"**.
    
3.  Le DJ peut se rendre sur `validation.php` pour gérer les propositions (accepter, refuser ou suppuser).
    

----------

## Contribution 🤝

Vous souhaitez contribuer à ce projet ? Voici comment faire :

1.  **Fork** le dépôt.
    
2.  Créez une branche pour votre fonctionnalité ou correction de bug.
    
3.  Effectuez vos modifications et assurez-vous que le projet fonctionne correctement.
    
4.  Soumettez une **pull request** pour discuter de vos changements.
    

----------

## Licence 📜

Ce projet est sous licence **MIT**. Pour plus de détails, consultez le fichier [LICENSE](https://chat.deepseek.com/a/chat/s/LICENSE).

----------

## Auteurs ✍️

-   **K0d (Michaël David)**


