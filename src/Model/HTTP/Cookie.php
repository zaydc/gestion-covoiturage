<?php

namespace App\Covoiturage\Model\HTTP;

class Cookie {

    public static function enregistrer(string $cle, mixed $valeur, ?int $dureeExpiration = null): void {
        $valeur = serialize($valeur);

        if (is_null($dureeExpiration)) {
            setcookie($cle, $valeur, 0);
        } else {
            setcookie($cle, $valeur, time() + $dureeExpiration);
        }
    }

    public static function lire(string $cle): mixed {
        if (!self::contient($cle)) return null;

        return unserialize($_COOKIE[$cle]);
    }

    public static function contient($cle): bool {
        return isset($_COOKIE[$cle]);
    }

    public static function supprimer($cle): void {
        unset($_COOKIE[$cle]);
        setcookie($cle, "", 1);
    }
}
