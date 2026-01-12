<?php

namespace App\Covoiturage\Model\Repository;

// on importe la configuration et PDO
use App\Covoiturage\Config\Conf;
use PDO;

// classe pour gerer la connexion unique a la base (singleton)
class DatabaseConnection {
    // instance unique de la classe
    private static ?self $instance = null;
    // instance PDO
    private PDO $pdo;

    // methode statique pour recuperer l objet PDO
    public static function getPdo(): PDO {
        return static::getInstance()->pdo;
    }

    // constructeur prive pour initialiser la connexion
    private function __construct() {
        // on recupere les parametres depuis la classe Conf
        $hostname = Conf::getHostname();
        $databaseName = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();
        $port = Conf::getPort();

        // on construit le DSN pour PDO
        $dsn = "mysql:host=$hostname;port=$port;dbname=$databaseName;charset=utf8";

        // on cree l instance PDO avec mode d erreur en exception
        $this->pdo = new PDO($dsn, $login, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

    // methode pour recuperer l instance unique (creation a la premiere utilisation)
    private static function getInstance(): self {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}
