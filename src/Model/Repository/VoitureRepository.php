<?php
// debut du fichier php
namespace App\Covoiturage\Model\Repository;

// on importe la classe Voiture et la classe abstraite pour les data objects
use App\Covoiturage\Model\DataObject\Voiture;
use App\Covoiturage\Model\DataObject\AbstractDataObject;

// repository pour la table voiture
class VoitureRepository extends AbstractRepository {

    // construit un objet Voiture a partir d un tableau associe a une ligne SQL
    protected function construire(array $voitureFormatTableau): AbstractDataObject {
        return new Voiture(
            $voitureFormatTableau["immatriculation"],
            $voitureFormatTableau["marque"],
            $voitureFormatTableau["couleur"],
            (int)$voitureFormatTableau["nbSieges"]
        );
    }

    // nom de la table associee
    protected function getNomTable(): string {
        return "voiture";
    }

    // nom de la cle primaire
    protected function getNomClePrimaire(): string {
        return "immatriculation";
    }

    // methode pour sauvegarder une voiture en base
    public static function sauvegarder(Voiture $voiture): void {
        // requete avec IGNORE pour eviter erreur si la cle existe deja
        $sql = "INSERT IGNORE INTO voiture (immatriculation, marque, couleur, nbSieges) 
                VALUES (:immatriculationTag, :marqueTag, :couleurTag, :nbSiegesTag)";

        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $values = array(
            "immatriculationTag" => $voiture->getImmatriculation(),
            "marqueTag" => $voiture->getMarque(),
            "couleurTag" => $voiture->getCouleur(),
            "nbSiegesTag" => $voiture->getNbSieges(),
        );

        // execution de la requete avec les valeurs
        $pdoStatement->execute($values);
    }

    // retourne la liste des noms de colonnes de la table
    protected function getNomsColonnes(): array {
        return ["immatriculation", "marque", "couleur", "nbSieges"];
    }
}
?>
