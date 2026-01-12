<?php
// debut du fichier php
namespace App\Covoiturage\Model\Repository;

// on importe la classe Trajet et la classe abstraite pour les data objects
use App\Covoiturage\Model\DataObject\Trajet;
use App\Covoiturage\Model\DataObject\AbstractDataObject;

// repository pour la table trajet
class TrajetRepository extends AbstractRepository {

    // construit un objet Trajet a partir d un tableau associe a une ligne SQL
    protected function construire(array $trajetFormatTableau): AbstractDataObject {
        return new Trajet(
            (int)$trajetFormatTableau["id"],
            $trajetFormatTableau["depart"],
            $trajetFormatTableau["arrivee"],
            $trajetFormatTableau["date"],
            (int)$trajetFormatTableau["nbPlaces"],
            (int)$trajetFormatTableau["prix"],
            $trajetFormatTableau["conducteurLogin"]
        );
    }

    // nom de la table associee
    protected function getNomTable(): string {
        return "trajet";
    }

    // nom de la cle primaire
    protected function getNomClePrimaire(): string {
        return "id";
    }

    // methode pour sauvegarder un trajet en base
    public static function sauvegarder(Trajet $trajet): void {
        // requete INSERT sans l id car il est auto increment
        $sql = "INSERT INTO trajet (depart, arrivee, date, nbPlaces, prix, conducteurLogin) 
                VALUES (:departTag, :arriveeTag, :dateTag, :nbPlacesTag, :prixTag, :conducteurLoginTag)";

        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $values = array(
            "departTag" => $trajet->getDepart(),
            "arriveeTag" => $trajet->getArrivee(),
            "dateTag" => $trajet->getDate(),
            "nbPlacesTag" => $trajet->getNbPlaces(),
            "prixTag" => $trajet->getPrix(),
            "conducteurLoginTag" => $trajet->getConducteurLogin(),
        );

        // execution de la requete avec les valeurs
        $pdoStatement->execute($values);
    }

    // retourne la liste des noms de colonnes de la table
    protected function getNomsColonnes(): array {
        return ["id", "depart", "arrivee", "date", "nbPlaces", "prix", "conducteurLogin"];
    }
}
?>
