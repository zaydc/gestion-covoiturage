<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des voitures</title>
</head>
<body>
    <h1>Liste des voitures</h1>

    <table>
        <thead>
            <tr>
                <th>Immatriculation</th>
                <th>Marque</th>
                <th>Couleur</th>
                <th>Sièges</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($voitures as $voiture) {
                $immat = $voiture->getImmatriculation();
                $immatHtml = htmlspecialchars($immat);
                $immatUrl = rawurlencode($immat);
            ?>
                <tr>
                    <td><?= $immatHtml ?></td>
                    <td><?= htmlspecialchars($voiture->getMarque()) ?></td>
                    <td><?= htmlspecialchars($voiture->getCouleur()) ?></td>
                    <td><?= $voiture->getNbSieges() ?></td>
                    <td>
                        <a href="../web/frontController.php?controller=voiture&action=read&immat=<?= $immatUrl ?>">Détails</a>
                        <a href="../web/frontController.php?controller=voiture&action=update&immat=<?= $immatUrl ?>">Modifier</a>
                        <a href="../web/frontController.php?controller=voiture&action=delete&immat=<?= $immatUrl ?>" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <p><a href="../web/frontController.php?controller=voiture&action=create">Créer une nouvelle voiture</a></p>
</body>
</html>
