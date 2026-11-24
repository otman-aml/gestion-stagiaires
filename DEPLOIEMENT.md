# Guide de déploiement en production

Ce document décrit les étapes recommandées pour déployer l'application de gestion des stagiaires depuis un environnement local (XAMPP) vers un environnement de production.

## 1. Préparer l'environnement de production

- Serveur web (Apache ou Nginx) configuré pour pointer vers le dossier `public/` du projet.
- PHP 8.1 ou supérieur avec les extensions requises par Laravel.
- Composer installé sur le serveur (ou déploiement des dépendances depuis un poste de préparation).
- MySQL disponible et accessible depuis l'application.
- Node.js et npm disponibles sur le poste utilisé pour compiler les assets (la compilation peut être faite avant le transfert).

## 2. Configurer les variables d'environnement

Copiez le fichier `.env.example` vers `.env` sur le serveur si nécessaire, puis adaptez au minimum les variables suivantes :

```env
APP_NAME="Gestion des stagiaires"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://votre-domaine.exemple

APP_LOCALE=fr
APP_FALLBACK_LOCALE=fr
APP_FAKER_LOCALE=fr_MA

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion_stagiaires
DB_USERNAME=utilisateur_mysql
DB_PASSWORD=mot_de_passe_mysql

SESSION_SECURE_COOKIE=true
```

Points importants :

- **`APP_ENV=production`** : indique que l'application fonctionne en production.
- **`APP_DEBUG=false`** : désactive l'affichage détaillé des erreurs aux utilisateurs. Ne jamais laisser `true` en production.
- **`APP_URL`** : renseigner l'URL publique réelle de l'application.
- **Base de données** : utiliser un compte MySQL dédié avec les droits nécessaires, et un mot de passe robuste.
- **`SESSION_SECURE_COOKIE=true`** : à activer lorsque le site est servi en HTTPS (recommandé).

Après modification du fichier `.env`, générez la clé d'application si ce n'est pas déjà fait :

```bash
php artisan key:generate
```

## 3. Installer les dépendances et préparer la base de données

```bash
composer install --no-dev --optimize-autoloader
php artisan migrate --force
```

Pour initialiser la base avec les données de démonstration (à réserver à un environnement de recette ou de première mise en place) :

```bash
php artisan migrate:fresh --seed --force
```

## 4. Compiler les assets front-end

Les fichiers CSS et JavaScript doivent être compilés pour la production :

```bash
npm install
npm run build
```

Vérifiez que le dossier `public/build/` est bien présent sur le serveur après déploiement.

## 5. Optimiser l'application Laravel

Exécutez les commandes d'optimisation pour améliorer les performances :

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Vous pouvez également utiliser la commande globale :

```bash
php artisan optimize
```

En cas de modification de la configuration, des routes ou des vues après mise en cache, pensez à vider puis régénérer les caches :

```bash
php artisan optimize:clear
php artisan optimize
```

## 6. Sécurité et mise en service

- **Mot de passe du responsable** : le compte de démonstration est fourni avec un mot de passe par défaut (`password123`). Il doit être changé avant toute utilisation réelle de l'application.
- Vérifiez les droits d'écriture sur les dossiers `storage/` et `bootstrap/cache/`.
- Assurez-vous que le fichier `.env` n'est pas accessible publiquement.
- Servez l'application exclusivement via HTTPS en production.

## 7. Vérification après déploiement

- Accéder à la page de connexion et se connecter avec le compte responsable.
- Vérifier l'affichage du tableau de bord et des listes.
- Tester l'ajout, la modification et la suppression d'un stagiaire.
- Tester le blocage de suppression d'un encadrant ayant des stagiaires affectés.
- Confirmer que les messages de confirmation et les messages flash s'affichent correctement.
