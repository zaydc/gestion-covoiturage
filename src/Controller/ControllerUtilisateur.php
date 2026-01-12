<?php
namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\Repository\UtilisateurRepository;
use App\Covoiturage\Model\DataObject\Utilisateur;
use App\Covoiturage\Lib\MessageFlash;

class ControllerUtilisateur extends GenericController {

    public static function readAll(): void {
        $utilisateurRepository = new UtilisateurRepository();
        $utilisateurs = $utilisateurRepository->selectAll();
        $pagetitle = 'Liste des utilisateurs';
        $cheminVueBody = 'utilisateur/list.php';
        self::afficheVue('view.php', [
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody,
            'utilisateurs' => $utilisateurs,
        ]);
    }

    public static function read(): void {
        $login = $_GET['login'] ?? null;
        if (!$login) {
            MessageFlash::ajouter("danger", "Login manquant");
            self::rediriger("frontController.php?controller=utilisateur&action=readAll");
            return;
        }

        $utilisateurRepository = new UtilisateurRepository();
        $utilisateur = $utilisateurRepository->select($login);

        if (!$utilisateur) {
            MessageFlash::ajouter("danger", "Aucun utilisateur trouvé");
            self::rediriger("frontController.php?controller=utilisateur&action=readAll");
            return;
        }

        $pagetitle = 'Détail utilisateur';
        $cheminVueBody = 'utilisateur/detail.php';
        self::afficheVue('view.php', [
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody,
            'utilisateur' => $utilisateur,
        ]);
    }

    public static function create(): void {
        $pagetitle = 'Créer un utilisateur';
        $cheminVueBody = 'utilisateur/create.php';
        self::afficheVue('view.php', [
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody,
        ]);
    }

    public static function created(): void {
        $login = $_GET['login'] ?? null;
        $nom = $_GET['nom'] ?? null;
        $prenom = $_GET['prenom'] ?? null;

        if (!$login || !$nom || !$prenom) {
            MessageFlash::ajouter("danger", "Tous les champs doivent être remplis");
            self::rediriger("frontController.php?controller=utilisateur&action=create");
            return;
        }

        // Vérifier si l'utilisateur existe déjà
        $utilisateurRepository = new UtilisateurRepository();
        $existant = $utilisateurRepository->select($login);
        if ($existant) {
            MessageFlash::ajouter("warning", "Un utilisateur avec ce login existe déjà");
            self::rediriger("frontController.php?controller=utilisateur&action=create");
            return;
        }

        $utilisateur = new Utilisateur($login, $nom, $prenom);
        UtilisateurRepository::sauvegarder($utilisateur);

        MessageFlash::ajouter("success", "L'utilisateur a bien été créé !");
        self::rediriger("frontController.php?controller=utilisateur&action=readAll");
    }

    public static function update(): void {
        $login = $_GET['login'] ?? null;
        if (!$login) {
            MessageFlash::ajouter("danger", "Login manquant");
            self::rediriger("frontController.php?controller=utilisateur&action=readAll");
            return;
        }

        $utilisateurRepository = new UtilisateurRepository();
        $utilisateur = $utilisateurRepository->select($login);

        if (!$utilisateur) {
            MessageFlash::ajouter("danger", "Aucun utilisateur trouvé");
            self::rediriger("frontController.php?controller=utilisateur&action=readAll");
            return;
        }

        $pagetitle = 'Mettre à jour un utilisateur';
        $cheminVueBody = 'utilisateur/update.php';
        self::afficheVue('view.php', [
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody,
            'utilisateur' => $utilisateur,
        ]);
    }

    public static function updated(): void {
        $login = $_GET['login'] ?? null;
        $nom = $_GET['nom'] ?? null;
        $prenom = $_GET['prenom'] ?? null;

        if (!$login || !$nom || !$prenom) {
            MessageFlash::ajouter("danger", "Tous les champs doivent être remplis");
            self::rediriger("frontController.php?controller=utilisateur&action=update&login=$login");
            return;
        }

        $utilisateur = new Utilisateur($login, $nom, $prenom);
        $utilisateurRepository = new UtilisateurRepository();
        $utilisateurRepository->update($utilisateur);

        MessageFlash::ajouter("success", "L'utilisateur a bien été mis à jour !");
        self::rediriger("frontController.php?controller=utilisateur&action=readAll");
    }

    public static function delete(): void {
        $login = $_GET['login'] ?? null;
        if (!$login) {
            MessageFlash::ajouter("danger", "Login manquant");
            self::rediriger("frontController.php?controller=utilisateur&action=readAll");
            return;
        }

        $utilisateurRepository = new UtilisateurRepository();
        $utilisateurRepository->delete($login);

        MessageFlash::ajouter("success", "L'utilisateur a bien été supprimé !");
        self::rediriger("frontController.php?controller=utilisateur&action=readAll");
    }
}