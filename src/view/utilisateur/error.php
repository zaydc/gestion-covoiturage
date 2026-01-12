<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Erreur - Utilisateur</title>
</head>
<body>
    <h1>Erreur</h1>
    <p>Problème avec l'utilisateur : <?= htmlspecialchars($errorMessage) ?></p>
    <p><a href="../web/frontController.php?controller=utilisateur&action=readAll">Retour à la liste des utilisateurs</a></p>
</body>
</html>
