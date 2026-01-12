<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Lib\PreferenceControleur;
use App\Covoiturage\Lib\MessageFlash;

class GenericController {

    public static function formulairePreference(): void {
        $pagetitle = 'Préférences';
        $cheminVueBody = 'formulairePreference.php';

        self::afficheVue('view.php', [
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody,
            'controleur_defaut' => PreferenceControleur::lire(),
        ]);
    }

    public static function enregistrerPreference(): void {
        $controleur = $_GET['controleur_defaut'] ?? 'voiture';

        PreferenceControleur::enregistrer($controleur);

        MessageFlash::ajouter("success", "La préférence de contrôleur est enregistrée !");

        self::rediriger("frontController.php");
    }

    protected static function afficheVue(string $cheminVue, array $parametres = []): void {
        extract($parametres);
        require __DIR__ . "/../view/$cheminVue";
    }

    protected static function rediriger(string $url): void {
        header("Location: $url");
        exit();
    }

    public static function error(string $message = ""): void {
        $pagetitle = 'Erreur';
        $cheminVueBody = 'error.php';

        self::afficheVue('view.php', [
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody,
            'errorMessage' => $message ?: "Erreur inconnue"
        ]);
    }
}
