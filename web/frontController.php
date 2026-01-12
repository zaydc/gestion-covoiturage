<?php
/**
 * Front Controller - Point d'entrée principal de l'application
 * 
 * Ce fichier est le point d'entrée unique de l'application.
 * Il gère le routage des requêtes vers les contrôleurs appropriés.
 * 
 * @package App
 * @version 1.0.0
 * @author Zayd Crombez
 * @license MIT
 */

declare(strict_types=1);

// Démarrage de la session
session_start();

use App\Covoiturage\Lib\Psr4AutoloaderClass;
use App\Covoiturage\Lib\PreferenceControleur;

// Chargement de l'autoloader
require_once __DIR__ . '/../src/Lib/Psr4AutoloaderClass.php';

// Configuration de l'autoloader
$loader = new Psr4AutoloaderClass();
$loader->addNamespace('App\Covoiturage', __DIR__ . '/../src');
$loader->register();

try {
    // Récupération de l'action depuis l'URL (par défaut: 'readAll')
    $action = $_GET['action'] ?? 'readAll';
    
    // Détermination du contrôleur à utiliser
    // Priorité au paramètre GET, puis aux préférences utilisateur, puis valeur par défaut
    if (isset($_GET['controller'])) {
        $controller = $_GET['controller'];
    } elseif (PreferenceControleur::existe()) {
        $controller = PreferenceControleur::lire();
    } else {
        $controller = 'voiture'; // Contrôleur par défaut
    }

    // Construction du nom complet de la classe du contrôleur
    $controllerClassName = "App\\Covoiturage\\Controller\\Controller" . ucfirst($controller);

    // Vérification de l'existence de la classe du contrôleur
    if (!class_exists($controllerClassName)) {
        throw new Exception("Le contrôleur '$controller' n'existe pas.");
    }

    // Vérification de l'existence de la méthode dans le contrôleur
    if (!method_exists($controllerClassName, $action)) {
        throw new Exception("L'action '$action' n'existe pas dans le contrôleur '$controller'.");
    }

    // Exécution de l'action du contrôleur
    $controllerClassName::$action();
    
} catch (Exception $e) {
    // Journalisation de l'erreur
    error_log('Erreur : ' . $e->getMessage());
    
    // Affichage d'une page d'erreur générique en production
    if (defined('APP_ENV') && APP_ENV === 'production') {
        header('HTTP/1.1 500 Internal Server Error');
        include __DIR__ . '/../src/View/error/500.php';
    } else {
        // Affichage détaillé de l'erreur en développement
        echo "<h1>Erreur : " . htmlspecialchars($e->getMessage()) . "</h1>";
        echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    }
}