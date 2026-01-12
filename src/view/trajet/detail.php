<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail du trajet</title>
</head>
<body>
    <h1>Détail du trajet</h1>

    <?php if (isset($trajet)) : ?>
        <ul>
            <li><strong>ID :</strong> <?= $trajet->getId() ?></li>
            <li><strong>Départ :</strong> <?= htmlspecialchars($trajet->getDepart()) ?></li>
            <li><strong>Arrivée :</strong> <?= htmlspecialchars($trajet->getArrivee()) ?></li>
            <li><strong>Date :</strong> <?= htmlspecialchars($trajet->getDate()) ?></li>
            <li><strong>Nombre de places :</strong> <?= $trajet->getNbPlaces() ?></li>
            <li><strong>Prix :</strong> <?= $trajet->getPrix() ?> €</li>
            <li><strong>Conducteur :</strong> <?= htmlspecialchars($trajet->getConducteurLogin()) ?></li>
        </ul>
    <?php else : ?>
        <p>Aucun trajet trouvé.</p>
    <?php endif; ?>

    <p><a href="../web/frontController.php?controller=trajet&action=readAll">Retour à la liste</a></p>
</body>
</html>
