<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail d'une voiture</title>
</head>
<body>
    <h1>Détails de la voiture</h1>

    <?php if (isset($voiture)) : ?>
        <table>
            <tr>
                <th>Immatriculation</th>
                <td><?= htmlspecialchars($voiture->getImmatriculation()) ?></td>
            </tr>
            <tr>
                <th>Marque</th>
                <td><?= htmlspecialchars($voiture->getMarque()) ?></td>
            </tr>
            <tr>
                <th>Couleur</th>
                <td><?= htmlspecialchars($voiture->getCouleur()) ?></td>
            </tr>
            <tr>
                <th>Nombre de sièges</th>
                <td><?= $voiture->getNbSieges() ?></td>
            </tr>
        </table>

        <p>
            <a href="../web/frontController.php?controller=voiture&action=update&immat=<?= rawurlencode($voiture->getImmatriculation()) ?>">Modifier</a>
            <a href="../web/frontController.php?controller=voiture&action=delete&immat=<?= rawurlencode($voiture->getImmatriculation()) ?>" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
        </p>
        <p><a href="../web/frontController.php?controller=voiture&action=readAll">Retour à la liste</a></p>
    <?php else : ?>
        <p>Aucune voiture à afficher.</p>
    <?php endif; ?>
</body>
</html>
