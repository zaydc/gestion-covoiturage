<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\Repository\TrajetRepository;
use App\Covoiturage\Model\DataObject\Trajet;
use App\Covoiturage\Lib\MessageFlash;

/**
 * Contrôleur Trajet avec les actions CRUD
 */
class ControllerTrajet extends GenericController {

    // Action readAll : affiche la liste des trajets
    public static function readAll(): void {
        $trajetRepository = new TrajetRepository();
        $trajets = $trajetRepository->selectAll();
        $pagetitle = 'Liste des trajets';
        $cheminVueBody = 'trajet/list.php';
        self::afficheVue('view.php', [
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody,
            'trajets' => $trajets,
        ]);
    }

    // Action read : affiche le detail d un trajet
    public static function read(): void {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            MessageFlash::ajouter("danger", "Identifiant manquant");
            self::rediriger("frontController.php?controller=trajet&action=readAll");
            return;
        }

        $trajetRepository = new TrajetRepository();
        $trajet = $trajetRepository->select($id);

        if (!$trajet) {
            MessageFlash::ajouter("danger", "Aucun trajet trouvé");
            self::rediriger("frontController.php?controller=trajet&action=readAll");
            return;
        }

        $pagetitle = 'Détail trajet';
        $cheminVueBody = 'trajet/detail.php';
        self::afficheVue('view.php', [
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody,
            'trajet' => $trajet,
        ]);
    }

    // Action delete : supprime un trajet
    public static function delete(): void {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            MessageFlash::ajouter("danger", "Identifiant manquant");
            self::rediriger("frontController.php?controller=trajet&action=readAll");
            return;
        }

        $trajetRepository = new TrajetRepository();
        $trajetRepository->delete($id);

        MessageFlash::ajouter("success", "Le trajet a bien été supprimé !");
        self::rediriger("frontController.php?controller=trajet&action=readAll");
    }

    // Action create : affiche le formulaire de creation
    public static function create(): void {
        $pagetitle = 'Créer un trajet';
        $cheminVueBody = 'trajet/create.php';
        self::afficheVue('view.php', [
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody,
        ]);
    }

    // Action update : affiche le formulaire de mise a jour
    public static function update(): void {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            MessageFlash::ajouter("danger", "Identifiant manquant");
            self::rediriger("frontController.php?controller=trajet&action=readAll");
            return;
        }

        $trajetRepository = new TrajetRepository();
        $trajet = $trajetRepository->select($id);

        if (!$trajet) {
            MessageFlash::ajouter("danger", "Aucun trajet trouvé");
            self::rediriger("frontController.php?controller=trajet&action=readAll");
            return;
        }

        $pagetitle = 'Mettre à jour un trajet';
        $cheminVueBody = 'trajet/update.php';
        self::afficheVue('view.php', [
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody,
            'trajet' => $trajet,
        ]);
    }

    // Action created : sauvegarde un nouveau trajet
    public static function created(): void {
        $depart = $_GET['depart'] ?? null;
        $arrivee = $_GET['arrivee'] ?? null;
        $date = $_GET['date'] ?? null;
        $nbPlaces = $_GET['nbPlaces'] ?? null;
        $prix = $_GET['prix'] ?? null;
        $conducteurLogin = $_GET['conducteurLogin'] ?? null;

        if (!$depart || !$arrivee || !$date || !$nbPlaces || !$prix || !$conducteurLogin) {
            MessageFlash::ajouter("danger", "Tous les champs doivent être remplis");
            self::rediriger("frontController.php?controller=trajet&action=create");
            return;
        }

        // On met 0 pour l id car il est auto increment
        $trajet = new Trajet(0, $depart, $arrivee, $date, (int)$nbPlaces, (int)$prix, $conducteurLogin);
        TrajetRepository::sauvegarder($trajet);

        MessageFlash::ajouter("success", "Le trajet a bien été créé !");
        self::rediriger("frontController.php?controller=trajet&action=readAll");
    }

    // Action updated : met a jour un trajet existant
    public static function updated(): void {
        $id = $_GET['id'] ?? null;
        $depart = $_GET['depart'] ?? null;
        $arrivee = $_GET['arrivee'] ?? null;
        $date = $_GET['date'] ?? null;
        $nbPlaces = $_GET['nbPlaces'] ?? null;
        $prix = $_GET['prix'] ?? null;
        $conducteurLogin = $_GET['conducteurLogin'] ?? null;

        if (!$id || !$depart || !$arrivee || !$date || !$nbPlaces || !$prix || !$conducteurLogin) {
            MessageFlash::ajouter("danger", "Tous les champs doivent être remplis");
            self::rediriger("frontController.php?controller=trajet&action=update&id=$id");
            return;
        }

        $trajet = new Trajet((int)$id, $depart, $arrivee, $date, (int)$nbPlaces, (int)$prix, $conducteurLogin);
        $trajetRepository = new TrajetRepository();
        $trajetRepository->update($trajet);

        MessageFlash::ajouter("success", "Le trajet a bien été mis à jour !");
        self::rediriger("frontController.php?controller=trajet&action=readAll");
    }
}
?>
