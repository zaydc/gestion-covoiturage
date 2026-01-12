<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mettre à jour une voiture</title>
</head>
<body>
    <h1>Mettre à jour une voiture</h1>

    <?php if (isset($voiture)) : ?>
        <form method="get" action="../web/frontController.php">
            <fieldset>
                <legend>Formulaire de mise à jour :</legend>

                <p>
                    <label for="immat_id">Immatriculation</label> :
                    <input type="text" value="<?= htmlspecialchars($voiture->getImmatriculation()) ?>" id="immat_id" readonly/>
                </p>

                <p>
                    <label for="marque_id">Marque</label> :
                    <input type="text" name="marque" value="<?= htmlspecialchars($voiture->getMarque()) ?>" id="marque_id" required/>
                </p>

                <p>
                    <label for="couleur_id">Couleur</label> :
                    <input type="text" name="couleur" value="<?= htmlspecialchars($voiture->getCouleur()) ?>" id="couleur_id" required/>
                </p>

                <p>
                    <label for="sieges_id">Nombre de sièges</label> :
                    <input type="number" min="1" name="nbSieges" value="<?= $voiture->getNbSieges() ?>" id="sieges_id" required/>
                </p>

                <input type="hidden" name="immatriculation" value="<?= htmlspecialchars($voiture->getImmatriculation()) ?>">
                <input type="hidden" name="controller" value="voiture">
                <input type="hidden" name="action" value="updated">

                <p>
                    <input type="submit" value="Mettre à jour la voiture" />
                </p>
            </fieldset>
        </form>

        <p><a href="../web/frontController.php?controller=voiture&action=readAll">Retour à la liste</a></p>
    <?php else : ?>
        <p>Aucune voiture à modifier.</p>
    <?php endif; ?>
</body>
</html>
