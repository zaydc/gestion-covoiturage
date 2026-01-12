<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Erreur - Voiture</title>
</head>
<body>
    <h1>Erreur</h1>
    <p>Problème avec la voiture : <?= htmlspecialchars($errorMessage) ?></p>
    <p><a href="../web/frontController.php?controller=voiture&action=readAll">Retour à la liste des voitures</a></p>
</body>
</html>
