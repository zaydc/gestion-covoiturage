<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
</head>
<body>
    <h1>Liste des utilisateurs</h1>

    <table>
        <thead>
            <tr>
                <th>Login</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($utilisateurs as $utilisateur) {
                $login = $utilisateur->getLogin();
                $loginHtml = htmlspecialchars($login);
                $loginUrl = rawurlencode($login);
            ?>
                <tr>
                    <td><?= $loginHtml ?></td>
                    <td><?= htmlspecialchars($utilisateur->getNom()) ?></td>
                    <td><?= htmlspecialchars($utilisateur->getPrenom()) ?></td>
                    <td>
                        <a href="../web/frontController.php?controller=utilisateur&action=read&login=<?= $loginUrl ?>">Détails</a>
                        <a href="../web/frontController.php?controller=utilisateur&action=update&login=<?= $loginUrl ?>">Modifier</a>
                        <a href="../web/frontController.php?controller=utilisateur&action=delete&login=<?= $loginUrl ?>" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <p><a href="../web/frontController.php?controller=utilisateur&action=create">Créer un nouvel utilisateur</a></p>
</body>
</html>
