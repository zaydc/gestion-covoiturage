<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail d'un utilisateur</title>
</head>
<body>
    <h1>Détails de l'utilisateur</h1>

    <?php if (isset($utilisateur)) : ?>
        <table>
            <tr>
                <th>Login</th>
                <td><?= htmlspecialchars($utilisateur->getLogin()) ?></td>
            </tr>
            <tr>
                <th>Nom</th>
                <td><?= htmlspecialchars($utilisateur->getNom()) ?></td>
            </tr>
            <tr>
                <th>Prénom</th>
                <td><?= htmlspecialchars($utilisateur->getPrenom()) ?></td>
            </tr>
        </table>

        <p>
            <a href="../web/frontController.php?controller=utilisateur&action=update&login=<?= rawurlencode($utilisateur->getLogin()) ?>">Modifier</a>
            <a href="../web/frontController.php?controller=utilisateur&action=delete&login=<?= rawurlencode($utilisateur->getLogin()) ?>" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
        </p>
        <p><a href="../web/frontController.php?controller=utilisateur&action=readAll">Retour à la liste</a></p>
    <?php else : ?>
        <p>Aucun utilisateur à afficher.</p>
    <?php endif; ?>
</body>
</html>
