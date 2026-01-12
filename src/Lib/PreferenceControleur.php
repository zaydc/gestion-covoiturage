<?php

namespace App\Covoiturage\Lib;

use App\Covoiturage\Model\HTTP\Cookie;

class PreferenceControleur {
    private static string $cle = "preferenceControleur";

    public static function enregistrer(string $preference): void {
        Cookie::enregistrer(self::$cle, $preference);
    }

    public static function lire(): string {
        return Cookie::lire(self::$cle) ?? "voiture";
    }

    public static function existe(): bool {
        return Cookie::contient(self::$cle);
    }

    public static function supprimer(): void {
        Cookie::supprimer(self::$cle);
    }
}