<?php
namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Model\DataObject\Utilisateur;
use App\Covoiturage\Model\DataObject\AbstractDataObject;

class UtilisateurRepository extends AbstractRepository {

    protected function construire(array $utilisateurFormatTableau): AbstractDataObject {
        return new Utilisateur(
            $utilisateurFormatTableau["login"],
            $utilisateurFormatTableau["nom"],
            $utilisateurFormatTableau["prenom"]
        );
    }

    protected function getNomTable(): string {
        return "utilisateur";
    }

    protected function getNomClePrimaire(): string {
        return "login";
    }

    public static function sauvegarder(Utilisateur $utilisateur): void {
        $sql = "INSERT IGNORE INTO utilisateur (login, nom, prenom) 
                VALUES (:loginTag, :nomTag, :prenomTag)";

        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $values = array(
            "loginTag" => $utilisateur->getLogin(),
            "nomTag" => $utilisateur->getNom(),
            "prenomTag" => $utilisateur->getPrenom(),
        );

        $pdoStatement->execute($values);
    }

    protected function getNomsColonnes(): array {
        return ["login", "nom", "prenom"];
    }
}
?>
