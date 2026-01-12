# Documentation Technique - TD7 Gestion de Bibliothèque

## 📚 Table des matières
1. [Architecture](#-architecture)
2. [Structure des dossiers](#-structure-des-dossiers)
3. [Configuration](#-configuration)
4. [Base de données](#-base-de-données)
5. [Développement](#-développement)
6. [Déploiement](#-déploiement)

## 🏗️ Architecture

L'application suit une architecture MVC (Modèle-Vue-Contrôleur) avec un front controller unique.

### Composants principaux :
- **Front Controller** (`web/frontController.php`) : Point d'entrée unique de l'application
- **Contrôleurs** : Gèrent la logique métier et les requêtes
- **Modèles** : Représentent les données et la logique métier
- **Vues** : Gèrent l'affichage des données
- **Configuration** : Paramètres de l'application

## 📁 Structure des dossiers

```
.
├── assets/           # Fichiers statiques (CSS, JS, images)
├── src/              # Code source de l'application
│   ├── Config/      # Configuration de l'application
│   ├── Controller/  # Contrôleurs
│   ├── Lib/         # Bibliothèques et helpers
│   ├── Model/       # Modèles de données
│   └── View/        # Vues
├── web/             # Point d'entrée public
│   ├── .htaccess   # Configuration Apache
│   └── assets/     # Fichiers statiques publics
├── TD3.sql         # Schéma de la base de données
├── .gitignore      # Fichiers ignorés par Git
├── README.md       # Documentation principale
└── DOCUMENTATION.md # Cette documentation technique
```

## ⚙️ Configuration

### Configuration de l'application
1. Copiez le fichier `src/Config/Config.example.php` en `src/Config/Config.php`
2. Modifiez les valeurs selon votre environnement

### Configuration de la base de données
Modifiez le fichier `src/Config/Config.php` pour configurer l'accès à la base de données :

```php
public const DB_HOST = 'localhost';
public const DB_NAME = 'nom_de_la_base';
public const DB_USER = 'utilisateur';
public const DB_PASSWORD = 'mot_de_passe';
```

### Configuration d'Apache
Assurez-vous que le module `mod_rewrite` est activé et que la configuration suit les directives du fichier `.htaccess`.

## 🗃️ Base de données

### Création de la base de données
1. Créez une base de données MySQL
2. Importez le fichier `TD3.sql` dans votre serveur MySQL
3. Vérifiez les droits d'accès dans la configuration

## 💻 Développement

### Prérequis
- PHP 7.4+
- MySQL 5.7+
- Serveur web (Apache/Nginx)

### Installation
1. Clonez le dépôt
2. Installez les dépendances avec Composer (si nécessaire)
3. Configurez la base de données
4. Démarrez votre serveur web

### Bonnes pratiques
- Suivez les standards PSR-4 pour l'autoloading
- Utilisez des noms de classes et méthodes en anglais
- Documentez votre code avec PHPDoc
- Écrivez des tests unitaires

## 🚀 Déploiement

### Préparation pour la production
1. Mettez à jour la configuration dans `src/Config/Config.php` :
   ```php
   public const APP_ENV = 'production';
   public const APP_DEBUG = false;
   ```

2. Vérifiez les permissions des dossiers :
   - `web/assets/` doit être accessible en écriture
   - Les fichiers de cache doivent être accessibles en écriture

### Bonnes pratiques
- Ne déployez jamais le mode debug en production
- Utilisez HTTPS
- Sauvegardez régulièrement la base de données
- Mettez à jour régulièrement les dépendances

## 📝 Licence
Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.
