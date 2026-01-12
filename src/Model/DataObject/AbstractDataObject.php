<?php
// debut du fichier php
namespace App\Covoiturage\Model\DataObject;

// classe abstraite pour les objets de donnees
abstract class AbstractDataObject {
    // methode abstraite que chaque objet doit implementer pour retourner un tableau
    public abstract function formatTableau(): array;

    // methode magique pour convertir l objet en chaine JSON
    public function __toString(): string {
        return json_encode($this->formatTableau());
    }
}
?>
