<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer une voiture</title>
</head>
<body>
    <h1>Ajouter une nouvelle voiture</h1>

    <form method="get" action="../web/frontController.php">
        <fieldset>
            <legend>Formulaire de création :</legend>

            <p>
                <label for="immat_id">Immatriculation</label> :
                <input type="text" placeholder="256AB342" name="immatriculation" id="immat_id" required/>
            </p>

            <p>
                <label for="marque_id">Marque</label> :
                <input type="text" placeholder="Renault" name="marque" id="marque_id" required/>
            </p>

            <p>
                <label for="couleur_id">Couleur</label> :
                <input type="text" placeholder="Rouge" name="couleur" id="couleur_id" required/>
            </p>

            <p>
                <label for="sieges_id">Nombre de sièges</label> :
                <input type="number" min="1" name="nbSieges" id="sieges_id" required/>
            </p>

            <input type="hidden" name="controller" value="voiture">
            <input type="hidden" name="action" value="created">

            <p>
                <input type="submit" value="Créer la voiture" />
            </p>
        </fieldset>
    </form>

    <p><a href="../web/frontController.php?controller=voiture&action=readAll">Retour à la liste</a></p>
</body>
</html>
