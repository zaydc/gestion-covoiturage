<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un trajet</title>
</head>
<body>
    <h1>Ajouter un nouveau trajet</h1>

    <form method="get" action="../web/frontController.php">
        <fieldset>
            <legend>Formulaire de création :</legend>

            <p>
                <label for="depart_id">Départ</label> :
                <input type="text" placeholder="Paris" name="depart" id="depart_id" required/>
            </p>

            <p>
                <label for="arrivee_id">Arrivée</label> :
                <input type="text" placeholder="Lyon" name="arrivee" id="arrivee_id" required/>
            </p>

            <p>
                <label for="date_id">Date</label> :
                <input type="date" name="date" id="date_id" required/>
            </p>

            <p>
                <label for="nbPlaces_id">Nombre de places</label> :
                <input type="number" min="1" name="nbPlaces" id="nbPlaces_id" required/>
            </p>

            <p>
                <label for="prix_id">Prix (€)</label> :
                <input type="number" min="0" name="prix" id="prix_id" required/>
            </p>

            <p>
                <label for="conducteur_id">Login du conducteur</label> :
                <input type="text" placeholder="zayd01" name="conducteurLogin" id="conducteur_id" required/>
            </p>

            <input type="hidden" name="controller" value="trajet">
            <input type="hidden" name="action" value="created">

            <p>
                <input type="submit" value="Créer le trajet" />
            </p>
        </fieldset>
    </form>

    <p><a href="../web/frontController.php?controller=trajet&action=readAll">Retour à la liste</a></p>
</body>
</html>
