<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mettre à jour un trajet</title>
</head>
<body>
    <h1>Mettre à jour un trajet</h1>

    <?php if (isset($trajet)) : ?>
        <form method="get" action="../web/frontController.php">
            <fieldset>
                <legend>Formulaire de mise à jour :</legend>

                <p>
                    <label for="id_id">ID</label> :
                    <input type="text" value="<?= $trajet->getId() ?>" id="id_id" readonly/>
                </p>

                <p>
                    <label for="depart_id">Départ</label> :
                    <input type="text" name="depart" value="<?= htmlspecialchars($trajet->getDepart()) ?>" id="depart_id" required/>
                </p>

                <p>
                    <label for="arrivee_id">Arrivée</label> :
                    <input type="text" name="arrivee" value="<?= htmlspecialchars($trajet->getArrivee()) ?>" id="arrivee_id" required/>
                </p>

                <p>
                    <label for="date_id">Date</label> :
                    <input type="date" name="date" value="<?= htmlspecialchars($trajet->getDate()) ?>" id="date_id" required/>
                </p>

                <p>
                    <label for="nbPlaces_id">Nombre de places</label> :
                    <input type="number" min="1" name="nbPlaces" value="<?= $trajet->getNbPlaces() ?>" id="nbPlaces_id" required/>
                </p>

                <p>
                    <label for="prix_id">Prix (€)</label> :
                    <input type="number" min="0" name="prix" value="<?= $trajet->getPrix() ?>" id="prix_id" required/>
                </p>

                <p>
                    <label for="conducteur_id">Login du conducteur</label> :
                    <input type="text" name="conducteurLogin" value="<?= htmlspecialchars($trajet->getConducteurLogin()) ?>" id="conducteur_id" required/>
                </p>

                <input type="hidden" name="id" value="<?= $trajet->getId() ?>">
                <input type="hidden" name="controller" value="trajet">
                <input type="hidden" name="action" value="updated">

                <p>
                    <input type="submit" value="Mettre à jour le trajet" />
                </p>
            </fieldset>
        </form>

        <p><a href="../web/frontController.php?controller=trajet&action=readAll">Retour à la liste</a></p>
    <?php else : ?>
        <p>Aucun trajet à modifier.</p>
    <?php endif; ?>
</body>
</html>
