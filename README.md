# DJheros 🎧

## Description

**DJheros** est une application simple et intuitive qui permet aux utilisateurs de soumettre des propositions de musique et aux DJ de les gérer en les validant, refusant ou supprimant. Conçue pour faciliter la gestion des demandes de musique lors d'événements (soirées, festivals, etc.), cette application est un outil pratique pour les DJ et leur public.

L'application est compatible avec le plugin [djheros_connector](https://github.com/kodcast/djheros_connector), qui permet d'intégrer ses fonctionnalités avec **Nicotine+**.

---

## Fonctionnalités 🚀

- **Soumettre une proposition de musique** : Les utilisateurs peuvent proposer une chanson en indiquant le nom de l'artiste et le titre.
- **Gestion des propositions par le DJ** : Le DJ peut accepter, refuser ou supprimer les propositions soumises.
- **Interface simple et claire** : L'application est développée en PHP et utilise un fichier JSON pour stocker les propositions de manière légère et efficace.

---

## Prérequis ⚙️

Pour exécuter cette application, assurez-vous d'avoir les éléments suivants :

- Un serveur web avec **PHP (version 7.4 ou supérieure)**.
- Un accès en écriture au dossier d'installation de l'application, car le fichier `propositions.json` est utilisé pour stocker les propositions.

---

## Installation 📥

1. Clonez le projet ou téléchargez les fichiers sources :
    ```bash
    git clone https://github.com/kodcast/DjHeros.git
    ```
2. Placez les fichiers sur votre serveur web (par exemple, dans le répertoire `htdocs` ou un répertoire accessible via un serveur local).
3. Assurez-vous que le fichier `propositions.json` est présent dans le même répertoire que `index.php` et `validation.php`. S'il n'existe pas, il sera créé automatiquement.
4. Réglez les droits du fichier `propositions.json` pour permettre au serveur web de le lire et de l'écrire :
    ```bash
    chown www-data:www-data propositions.json
    chmod 664 propositions.json
    ```

---

## Utilisation 🎶

1. Accédez à la page d'accueil `index.php` pour soumettre des propositions de musique.
2. Les propositions soumises apparaîtront dans la section **"Propositions en attente"**.
3. Le DJ peut se rendre sur `validation.php` pour gérer les propositions (accepter, refuser ou supprimer).

---

## Contribution 🤝

Les contributions sont les bienvenues ! Vous pouvez signaler un bug, proposer une amélioration ou envoyer une pull request.

---

## Licence 📜

Distribué sous licence **GNU General Public License v3.0**.

---

## Auteurs ✍️

- **K0d (Michaël David)**

---

# DJheros 🎧 (English Version)

## Description

**DJheros** is a simple and intuitive application that allows users to submit music requests, while DJs can manage them by accepting, rejecting, or deleting them. Designed to make music request management easier during events (parties, festivals, etc.), this application is a practical tool for DJs and their audience.

The application is compatible with the [djheros_connector](https://github.com/kodcast/djheros_connector) plugin, which integrates its features with **Nicotine+**.

---

## Features 🚀

- **Submit a music request**: Users can propose a song by entering the artist's name and the title.
- **DJs can manage requests**: The DJ can accept, reject, or delete submitted proposals.
- **Simple and clear interface**: The application is developed in PHP and uses a JSON file to store requests in a lightweight and efficient way.

---

## Requirements ⚙️

To run this application, make sure you have the following:

- A web server with **PHP (version 7.4 or higher)**.
- Write access to the installation directory, as the `propositions.json` file is used to store requests.

---

## Installation 📥

1. Clone the project or download the source files:
    ```bash
    git clone https://github.com/kodcast/DjHeros.git
    ```
2. Place the files on your web server (e.g., in the `htdocs` directory or another accessible location).
3. Ensure that the `propositions.json` file is in the same directory as `index.php` and `validation.php`. If it doesn’t exist, it will be created automatically.
4. Set the correct permissions for `propositions.json` to allow the web server to read and write:
    ```bash
    chown www-data:www-data propositions.json
    chmod 664 propositions.json
    ```

---

## Usage 🎶

1. Access the homepage `index.php` to submit music requests.
2. Submitted requests will appear in the **"Pending Requests"** section.
3. The DJ can go to `validation.php` to manage requests (accept, reject, or delete them).

---

## Contribution 🤝

Contributions are welcome! Feel free to report an issue, suggest an improvement, or submit a pull request.

---

## License 📜

Distributed under the **GNU General Public License v3.0**.

---

## Authors ✍️

- **K0d (Michaël David)**
