# Gestion de Covoiturage

## 📝 Description
Application web de gestion de covoiturage développée dans le cadre du cours R301 (Développement Web) en BUT Informatique. Cette application permet aux utilisateurs de proposer et de réserver des trajets en covoiturage.

## 🚀 Fonctionnalités
- Gestion des trajets (création, modification, suppression)
- Inscription et gestion des utilisateurs
- Réservation de places dans les véhicules
- Gestion des véhicules (marque, modèle, nombre de places)
- Interface d'administration complète

## 🛠️ Prérequis
- PHP 7.4 ou supérieur
- MySQL 5.7 ou supérieur
- Serveur web Apache avec mod_rewrite activé
- Composer (pour la gestion des dépendances)

## 🚀 Installation

1. Cloner le dépôt :
```bash
git clone [URL_DU_REPO]
cd TD7-Crombez-Zayd
```

2. Configurer la base de données :
- Créer une base de données MySQL
- Importer le fichier `TD3.sql` dans votre serveur MySQL
- Configurer les accès à la base de données dans `src/Config/Config.php`

3. Configuration du serveur web :
- Définir le dossier `web` comme racine du site web
- Vérifier que le module Apache `mod_rewrite` est activé
- Configurer les droits d'accès aux dossiers si nécessaire

## 🏗️ Structure du projet
```
.
├── assets/          # Fichiers statiques (CSS, JS, images)
├── src/             # Code source de l'application
│   ├── Config/     # Fichiers de configuration
│   ├── Controller/ # Contrôleurs (Voiture, Utilisateur, Trajet)
│   ├── Model/      # Modèles de données
│   ├── View/       # Vues (templates)
│   └── Lib/        # Bibliothèques et helpers
├── web/            # Point d'entrée public
│   ├── .htaccess  # Configuration Apache
│   └── assets/    # Fichiers statiques publics
├── TD3.sql        # Schéma de la base de données
└── README.md      # Documentation du projet
```

## 👥 Auteur
- **Zayd** - Étudiant en BUT Informatique

## 📅 Dernière mise à jour
Janvier 2025
