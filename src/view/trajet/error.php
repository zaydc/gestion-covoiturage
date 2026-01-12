<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Erreur</title>
</head>
<body>
    <h1>Erreur</h1>
    <p><?= htmlspecialchars($errorMessage ?? 'Une erreur est survenue.') ?></p>
    <p><a href="../web/frontController.php?controller=trajet&action=readAll">Retour à la liste des trajets</a></p>
</body>
</html>
