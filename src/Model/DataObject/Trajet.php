<?php
// debut du fichier php
namespace App\Covoiturage\Model\DataObject;

// classe Trajet qui etend AbstractDataObject
class Trajet extends AbstractDataObject {
    // proprietes du trajet
    private int $id;
    private string $depart;
    private string $arrivee;
    private string $date;
    private int $nbPlaces;
    private int $prix;
    private string $conducteurLogin;

    // constructeur pour initialiser le trajet
    public function __construct(int $id, string $depart, string $arrivee, string $date, int $nbPlaces, int $prix, string $conducteurLogin) {
        $this->id = $id;
        $this->depart = $depart;
        $this->arrivee = $arrivee;
        $this->date = $date;
        $this->nbPlaces = $nbPlaces;
        $this->prix = $prix;
        $this->conducteurLogin = $conducteurLogin;
    }

    // getter pour l id
    public function getId(): int {
        return $this->id;
    }

    // getter pour le depart
    public function getDepart(): string {
        return $this->depart;
    }

    // getter pour l arrivee
    public function getArrivee(): string {
        return $this->arrivee;
    }

    // getter pour la date
    public function getDate(): string {
        return $this->date;
    }

    // getter pour le nombre de places
    public function getNbPlaces(): int {
        return $this->nbPlaces;
    }

    // getter pour le prix
    public function getPrix(): int {
        return $this->prix;
    }

    // getter pour le login du conducteur
    public function getConducteurLogin(): string {
        return $this->conducteurLogin;
    }

    // setter pour le depart
    public function setDepart(string $depart): void {
        $this->depart = $depart;
    }

    // setter pour l arrivee
    public function setArrivee(string $arrivee): void {
        $this->arrivee = $arrivee;
    }

    // setter pour la date
    public function setDate(string $date): void {
        $this->date = $date;
    }

    // setter pour le nombre de places
    public function setNbPlaces(int $nbPlaces): void {
        $this->nbPlaces = $nbPlaces;
    }

    // setter pour le prix
    public function setPrix(int $prix): void {
        $this->prix = $prix;
    }

    // setter pour le login du conducteur
    public function setConducteurLogin(string $conducteurLogin): void {
        $this->conducteurLogin = $conducteurLogin;
    }

    // methode pour formater l objet en tableau associatif
    public function formatTableau(): array {
        return [
            'id' => $this->id,
            'depart' => $this->depart,
            'arrivee' => $this->arrivee,
            'date' => $this->date,
            'nbPlaces' => $this->nbPlaces,
            'prix' => $this->prix,
            'conducteurLogin' => $this->conducteurLogin,
        ];
    }
}
?>
