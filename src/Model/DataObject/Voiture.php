<?php
// debut du fichier php
namespace App\Covoiturage\Model\DataObject;

// classe Voiture qui etend AbstractDataObject
class Voiture extends AbstractDataObject {
    // proprietes de la voiture
    private string $immatriculation;
    private string $marque;
    private string $couleur;
    private int $nbSieges;

    // constructeur pour initialiser la voiture
    public function __construct(string $immat, string $marque, string $couleur, int $nbSieges) {
        $this->immatriculation = $immat;
        $this->marque = $marque;
        $this->couleur = $couleur;
        $this->nbSieges = $nbSieges;
    }

    // getter pour l immatriculation
    public function getImmatriculation(): string {
        return $this->immatriculation;
    }

    // getter pour la marque
    public function getMarque(): string {
        return $this->marque;
    }

    // getter pour la couleur
    public function getCouleur(): string {
        return $this->couleur;
    }

    // getter pour le nombre de sieges
    public function getNbSieges(): int {
        return $this->nbSieges;
    }

    // setter pour la marque
    public function setMarque(string $marque): void {
        $this->marque = $marque;
    }

    // setter pour la couleur
    public function setCouleur(string $couleur): void {
        $this->couleur = $couleur;
    }

    // setter pour le nombre de sieges
    public function setNbSieges(int $nbSieges): void {
        $this->nbSieges = $nbSieges;
    }

    // methode pour formater l objet en tableau associatif
    public function formatTableau(): array {
        return [
            'immatriculation' => $this->immatriculation,
            'marque' => $this->marque,
            'couleur' => $this->couleur,
            'nbSieges' => $this->nbSieges,
        ];
    }
}
?>
