<?php

// debut du fichier php
// namespace pour organiser le code
namespace App\Covoiturage\Model\Repository;

// on importe la classe de base des objets de donnees
use App\Covoiturage\Model\DataObject\AbstractDataObject;
// on importe la classe pour la connexion a la base
use App\Covoiturage\Model\Repository\DatabaseConnection;
// on importe PDO pour utiliser les constantes PDO
use PDO;

// declaration d une classe abstraite pour les repository
abstract class AbstractRepository {

    // cette methode retourne un tableau d objets AbstractDataObject
    /** @return AbstractDataObject[] */
    public function selectAll(): array {
        // on recupere l instance PDO via la classe DatabaseConnection
        $pdo = DatabaseConnection::getPdo();
        // on construit la requete SQL pour selectionner toutes les lignes
        $sql = "SELECT * FROM " . $this->getNomTable();
        // on execute la requete directement car il n y a pas de parametre
        $pdoStatement = $pdo->query($sql);

        // on prepare un tableau vide pour stocker les objets construits
        $tab = [];
        // on parcourt chaque ligne retourne par PDO
        foreach ($pdoStatement as $FormatTableau) {
            // pour chaque ligne on appelle la methode construire pour creer un objet
            $tab[] = $this->construire($FormatTableau);
        }
        // on retourne le tableau d objets
        return $tab;
    }

    // methode abstraite pour obtenir le nom de la table en base
    abstract protected function getNomTable(): string;
    // methode abstraite pour construire un objet a partir d un tableau
    abstract protected function construire(array $objetFormatTableau): AbstractDataObject;

    // methode pour selectionner une ligne par sa cle primaire
    public function select(string $valeurClePrimaire): ?AbstractDataObject {
        // on construit la requete avec un parametre nomme
        $sql = "SELECT * from " . $this->getNomTable() . 
               " WHERE " . $this->getNomClePrimaire() . " = :valeurCleTag";

        // on prepare la requete pour eviter les injections SQL
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        // on prepare le tableau de valeurs pour l execution
        $values = array(
            "valeurCleTag" => $valeurClePrimaire,
        );
        // on execute la requete en passant les valeurs
        $pdoStatement->execute($values);
        // on recupere la premiere ligne sous forme de tableau associatif
        $objetFormatTableau = $pdoStatement->fetch(PDO::FETCH_ASSOC);
        // si aucune ligne on retourne null
        if ($objetFormatTableau === false) {
            return null;
        } else {
            // sinon on construit l objet et on le retourne
            return $this->construire($objetFormatTableau);
        }
    }

    // methode abstraite pour obtenir le nom de la cle primaire
    protected abstract function getNomClePrimaire(): string;

    // methode pour supprimer une ligne par sa cle primaire
    public function delete($valeurClePrimaire): void {
        // on construit la requete delete avec un parametre nomme
        $sql = "DELETE FROM " . $this->getNomTable() . " WHERE " . $this->getNomClePrimaire() . " = :valeurTag";
        // on prepare la requete
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        // on prepare les valeurs pour l execution
        $values = array(
            "valeurTag" => $valeurClePrimaire,
        );
        // on execute la requete de suppression
        $pdoStatement->execute($values);
    }

    // methode abstraite pour recupere la liste des noms de colonnes
    protected abstract function getNomsColonnes(): array;

    // methode pour mettre a jour une ligne a partir d un objet
    public function update(AbstractDataObject $object): void {
        // on recupere les colonnes et la cle primaire
        $colonnes = $this->getNomsColonnes();
        $clePrimaire = $this->getNomClePrimaire();

        // on va construire les parties "colonne = :colonne" pour le SET
        $setParts = [];
        foreach ($colonnes as $colonne) {
            // on saute la cle primaire pour ne pas la mettre dans le SET
            if ($colonne !== $clePrimaire) {
                $setParts[] = "$colonne = :$colonne";
            }
        }
        // on assemble la requete UPDATE avec les parties SET
        $sql = "UPDATE " . $this->getNomTable() . " 
            SET " . implode(", ", $setParts) . " 
            WHERE $clePrimaire = :$clePrimaire";
        // on recupere l objet PDO
        $pdo = DatabaseConnection::getPdo();
        // on prepare la requete
        $pdoStatement = $pdo->prepare($sql);
        // on execute en passant le tableau formate depuis l objet
        $pdoStatement->execute($object->formatTableau());
    }
}
