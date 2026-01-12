<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des trajets</title>
</head>
<body>
    <h1>Liste des trajets</h1>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>id</th>
                <th>depart</th>
                <th>arrivee</th>
                <th>date</th>
                <th>nbPlaces</th>
                <th>prix</th>
                <th>conducteurLogin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($trajets as $trajet) {
                $id = $trajet->getId();
                $idUrl = rawurlencode($id);
            ?>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= htmlspecialchars($trajet->getDepart()) ?></td>
                    <td><?= htmlspecialchars($trajet->getArrivee()) ?></td>
                    <td><?= htmlspecialchars($trajet->getDate()) ?></td>
                    <td><?= $trajet->getNbPlaces() ?></td>
                    <td><?= $trajet->getPrix() ?></td>
                    <td><?= htmlspecialchars($trajet->getConducteurLogin()) ?></td>
                    <td>
                        <a href="../web/frontController.php?controller=trajet&action=read&id=<?= $idUrl ?>">Détails</a>
                        <a href="../web/frontController.php?controller=trajet&action=update&id=<?= $idUrl ?>">Modifier</a>
                        <a href="../web/frontController.php?controller=trajet&action=delete&id=<?= $idUrl ?>" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <p><a href="../web/frontController.php?controller=trajet&action=create">Créer un nouveau trajet</a></p>
</body>
</html>
