<?php
// classe de configuration pour la base de donnees
/**
 * Class Conf
 * Classe de configuration pour la connexion a la base de donnees
 */

namespace App\Covoiturage\Config;

class Conf {

    // tableau avec les parametres de connexion
    private static array $databases = array(
        'hostname' => 'localhost',
        'database' => 'TD3',
        'login'    => 'root',
        'password' => 'root',
        'port'     => '8889'
    );

    // retourne le login de la base
    public static function getLogin(): string {
        return self::$databases['login'];
    }

    // retourne le nom d hote
    public static function getHostname(): string {
        return self::$databases['hostname'];
    }

    // retourne le nom de la base de donnees
    public static function getDatabase(): string {
        return self::$databases['database'];
    }

    // retourne le mot de passe
    public static function getPassword(): string {
        return self::$databases['password'];
    }

    // retourne le port utilise pour la connexion
    public static function getPort(): string {
        return self::$databases['port'];
    }
}
