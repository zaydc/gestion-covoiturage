<?php
// debut du fichier php
namespace App\Covoiturage\Model\DataObject;

// classe Utilisateur qui etend AbstractDataObject
class Utilisateur extends AbstractDataObject {
    // proprietes privees de l utilisateur
    private string $login;
    private string $nom;
    private string $prenom;

    // constructeur pour initialiser un utilisateur
    public function __construct(string $login, string $nom, string $prenom) {
        $this->login = $login;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    // getter pour le login
    public function getLogin(): string {
        return $this->login;
    }

    // getter pour le nom
    public function getNom(): string {
        return $this->nom;
    }

    // getter pour le prenom
    public function getPrenom(): string {
        return $this->prenom;
    }

    // setter pour le nom
    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    // setter pour le prenom
    public function setPrenom(string $prenom): void {
        $this->prenom = $prenom;
    }

    // methode pour formater l objet en tableau associatif
    public function formatTableau(): array {
        return [
            'login' => $this->login,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
        ];
    }
}
?>
