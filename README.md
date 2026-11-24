# Application de Gestion des Stagiaires

Cette application web permet de centraliser les informations des stagiaires au sein d'une entreprise, de les affecter à un encadrant et de suivre l'avancement de leur période de stage. Elle a pour objectif de remplacer la gestion via des fichiers Excel dispersés par un outil unique, clair et facile à utiliser.

## Fonctionnalités

- **Tableau de bord** : Vue d'ensemble avec le nombre total de stagiaires, les stages en cours, terminés, et la répartition par encadrant.
- **Gestion des stagiaires** : Ajout, modification, consultation et suppression. Inclut la recherche par nom et les filtres par statut ou encadrant.
- **Gestion des encadrants** : Ajout, modification et consultation de la liste. La suppression est bloquée si l'encadrant a encore des stagiaires affectés.
- **Affectation** : Chaque stagiaire est rattaché à un encadrant unique lors de son ajout ou de sa modification.
- **Sécurité** : Accès réservé au responsable de gestion via une page de connexion. Les données sensibles sont protégées.

## Prérequis

Avant de lancer le projet, assurez-vous d'avoir installé :
- **PHP** 8.1 ou supérieur
- **Composer** (gestionnaire de dépendances PHP)
- **Node.js** et **NPM** (pour compiler les styles avec Tailwind CSS)
- **MySQL** (via XAMPP, WAMP ou MAMP)

## Installation

Suivez ces étapes pour installer le projet en local :

**1. Cloner le dépôt ou extraire l'archive**
Placez le dossier du projet dans le répertoire de votre serveur local (par exemple : `C:\xampp\htdocs\gestion-stagiaires`).

**2. Installer les dépendances PHP**
Ouvrez un terminal à la racine du projet et lancez :
```bash
composer install
```

**3. Configurer l'environnement**
Copiez le fichier de configuration par défaut et générez la clé de l'application :

bash

```
cp .env.example .env
php artisan key:generate
```

**4. Configurer la base de données**
Ouvrez votre gestionnaire de base de données (ex: phpMyAdmin) et créez une base de données nommée `gestion_stagiaires`.
Ensuite, ouvrez le fichier `.env` à la racine du projet et modifiez les lignes suivantes avec vos identifiants :

env

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion_stagiaires
DB_USERNAME=root
DB_PASSWORD=
```

**5. Créer les tables et injecter les données de test**
Cette commande va générer la structure de la base de données et insérer des données de démonstration (encadrants et stagiaires) :

bash

```
php artisan migrate:fresh --seed
```

**6. Compiler les assets front-end**
Installez les dépendances Node.js et lancez la compilation de Tailwind CSS :

bash

```
npm install
npm run dev
```

## Lancement de l'application

1. Assurez-vous que les services **Apache** et **MySQL** sont démarrés dans XAMPP (ou votre serveur local).
2. Dans votre terminal, à la racine du projet, lancez le serveur de développement Laravel :
bash

```
php artisan serve
```

1. Ouvrez votre navigateur et accédez à l'adresse : `http://127.0.0.1:8000`

## Comptes de test
Un compte responsable est créé automatiquement lors de l'installation. Utilisez ces identifiants pour vous connecter :

- **Adresse e-mail :** karim.benjelloun@entreprise.ma
- **Mot de passe :** password123
*Note : Ce mot de passe est fourni à titre indicatif pour les tests. Il est vivement recommandé de le modifier avant toute mise en production.*

## Structure du projet
Le projet respecte l'architecture MVC standard de Laravel :

- `app/Http/Controllers/` : Contrôleurs gérant la logique de l'application (Dashboard, Stagiaires, Encadrants).
- `app/Http/Requests/` : Validation des formulaires (règles métier).
- `app/Models/` : Modèles Eloquent (User, Stagiaire, Encadrant).
- `database/migrations/` : Structure de la base de données.
- `database/seeders/` : Données de démonstration.
- `resources/views/` : Interface utilisateur (Blade et Tailwind CSS).
- `routes/web.php` : Définition des routes de l'application.
