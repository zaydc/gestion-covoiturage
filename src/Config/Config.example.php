<?php
/**
 * Fichier de configuration de l'application
 * 
 * Ce fichier contient les constantes de configuration de l'application.
 * Pour l'utiliser, copiez-le en tant que 'Config.php' et modifiez les valeurs.
 * 
 * @package App\Config
 * @version 1.0.0
 * @author Zayd Crombez
 * @license MIT
 */

declare(strict_types=1);

namespace App\Covoiturage\Config;

/**
 * Classe de configuration
 */
class Config
{
    // Configuration de la base de données
    public const DB_HOST = 'localhost';
    public const DB_NAME = 'nom_de_la_base';
    public const DB_USER = 'utilisateur';
    public const DB_PASSWORD = 'mot_de_passe';
    public const DB_CHARSET = 'utf8mb4';

    // Configuration de l'application
    public const APP_NAME = 'Gestion de Bibliothèque';
    public const APP_ENV = 'development'; // 'development' ou 'production'
    public const APP_DEBUG = true;
    public const APP_URL = 'http://localhost';

    // Chemins
    public const VIEW_PATH = __DIR__ . '/../../web/';
    public const UPLOAD_PATH = __DIR__ . '/../../web/uploads/';

    // Sécurité
    public const SESSION_NAME = 'bibliotheque_session';
    public const SESSION_LIFETIME = 3600; // 1 heure
    public const CSRF_TOKEN_NAME = 'csrf_token';

    /**
     * Empêche l'instanciation de la classe
     */
    private function __construct()
    {
        // La classe ne peut pas être instanciée
    }
}
