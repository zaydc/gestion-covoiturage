<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mettre à jour un utilisateur</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Mettre à jour un utilisateur</h1>

    <?php if (isset($utilisateur)) : ?>
        <form method="get" action="../web/frontController.php">
            <fieldset>
                <legend>Formulaire de mise à jour :</legend>

                <p>
                    <label for="login_id">Login</label> :
                    <input type="text" value="<?= htmlspecialchars($utilisateur->getLogin()) ?>" id="login_id" readonly/>
                </p>

                <p>
                    <label for="nom_id">Nom</label> :
                    <input type="text" name="nom" value="<?= htmlspecialchars($utilisateur->getNom()) ?>" id="nom_id" required/>
                </p>

                <p>
                    <label for="prenom_id">Prénom</label> :
                    <input type="text" name="prenom" value="<?= htmlspecialchars($utilisateur->getPrenom()) ?>" id="prenom_id" required/>
                </p>

                <input type="hidden" name="login" value="<?= htmlspecialchars($utilisateur->getLogin()) ?>">
                <input type="hidden" name="controller" value="utilisateur">
                <input type="hidden" name="action" value="updated">

                <p>
                    <input type="submit" value="Mettre à jour l'utilisateur" />
                </p>
            </fieldset>
        </form>

        <p><a href="../web/frontController.php?controller=utilisateur&action=readAll">Retour à la liste</a></p>
    <?php else : ?>
        <p>Aucun utilisateur à modifier.</p>
    <?php endif; ?>
</body>
</html>
