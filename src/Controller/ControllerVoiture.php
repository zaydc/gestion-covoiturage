<?php
namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\Repository\VoitureRepository;
use App\Covoiturage\Model\DataObject\Voiture;
use App\Covoiturage\Lib\MessageFlash;

class ControllerVoiture extends GenericController {

    public static function readAll(): void {
        $voitureRepository = new VoitureRepository();
        $voitures = $voitureRepository->selectAll();
        $pagetitle = 'Liste des voitures';
        $cheminVueBody = 'voiture/list.php';
        self::afficheVue('view.php', [
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody,
            'voitures' => $voitures,
        ]);
    }

    public static function read(): void {
        $immat = $_GET['immat'] ?? null;
        if (!$immat) {
            MessageFlash::ajouter("danger", "Immatriculation manquante");
            self::rediriger("frontController.php?controller=voiture&action=readAll");
            return;
        }

        $voitureRepository = new VoitureRepository();
        $voiture = $voitureRepository->select($immat);

        if (!$voiture) {
            MessageFlash::ajouter("danger", "Aucune voiture trouvée");
            self::rediriger("frontController.php?controller=voiture&action=readAll");
            return;
        }

        $pagetitle = 'Détail voiture';
        $cheminVueBody = 'voiture/detail.php';
        self::afficheVue('view.php', [
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody,
            'voiture' => $voiture,
        ]);
    }

    public static function create(): void {
        $pagetitle = 'Créer une voiture';
        $cheminVueBody = 'voiture/create.php';
        self::afficheVue('view.php', [
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody,
        ]);
    }

    public static function created(): void {
        $immat = $_GET['immatriculation'] ?? null;
        $marque = $_GET['marque'] ?? null;
        $couleur = $_GET['couleur'] ?? null;
        $nbSieges = $_GET['nbSieges'] ?? null;

        if (!$immat || !$marque || !$couleur || !$nbSieges) {
            MessageFlash::ajouter("danger", "Tous les champs doivent être remplis");
            self::rediriger("frontController.php?controller=voiture&action=create");
            return;
        }

        // Vérifier si la voiture existe déjà
        $voitureRepository = new VoitureRepository();
        $existant = $voitureRepository->select($immat);
        if ($existant) {
            MessageFlash::ajouter("warning", "Une voiture avec cette immatriculation existe déjà");
            self::rediriger("frontController.php?controller=voiture&action=create");
            return;
        }

        $voiture = new Voiture($immat, $marque, $couleur, (int)$nbSieges);
        VoitureRepository::sauvegarder($voiture);

        MessageFlash::ajouter("success", "La voiture a bien été créée !");
        self::rediriger("frontController.php?controller=voiture&action=readAll");
    }

    public static function update(): void {
        $immat = $_GET['immat'] ?? null;
        if (!$immat) {
            MessageFlash::ajouter("danger", "Immatriculation manquante");
            self::rediriger("frontController.php?controller=voiture&action=readAll");
            return;
        }

        $voitureRepository = new VoitureRepository();
        $voiture = $voitureRepository->select($immat);

        if (!$voiture) {
            MessageFlash::ajouter("danger", "Aucune voiture trouvée");
            self::rediriger("frontController.php?controller=voiture&action=readAll");
            return;
        }

        $pagetitle = 'Mettre à jour une voiture';
        $cheminVueBody = 'voiture/update.php';
        self::afficheVue('view.php', [
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody,
            'voiture' => $voiture,
        ]);
    }

    public static function updated(): void {
        $immat = $_GET['immatriculation'] ?? null;
        $marque = $_GET['marque'] ?? null;
        $couleur = $_GET['couleur'] ?? null;
        $nbSieges = $_GET['nbSieges'] ?? null;

        if (!$immat || !$marque || !$couleur || !$nbSieges) {
            MessageFlash::ajouter("danger", "Tous les champs doivent être remplis");
            self::rediriger("frontController.php?controller=voiture&action=update&immat=$immat");
            return;
        }

        $voiture = new Voiture($immat, $marque, $couleur, (int)$nbSieges);
        $voitureRepository = new VoitureRepository();
        $voitureRepository->update($voiture);

        MessageFlash::ajouter("success", "La voiture a bien été mise à jour !");
        self::rediriger("frontController.php?controller=voiture&action=readAll");
    }

    public static function delete(): void {
        $immat = $_GET['immat'] ?? null;
        if (!$immat) {
            MessageFlash::ajouter("danger", "Immatriculation manquante");
            self::rediriger("frontController.php?controller=voiture&action=readAll");
            return;
        }

        $voitureRepository = new VoitureRepository();
        $voitureRepository->delete($immat);

        MessageFlash::ajouter("success", "La voiture a bien été supprimée !");
        self::rediriger("frontController.php?controller=voiture&action=readAll");
    }
}