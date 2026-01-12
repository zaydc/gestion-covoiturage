<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un utilisateur</title>
</head>
<body>
    <h1>Ajouter un nouvel utilisateur</h1>

    <form method="get" action="../web/frontController.php">
        <fieldset>
            <legend>Formulaire de création :</legend>

            <p>
                <label for="login_id">Login</label> :
                <input type="text" placeholder="john_doe" name="login" id="login_id" required/>
            </p>

            <p>
                <label for="nom_id">Nom</label> :
                <input type="text" placeholder="Doe" name="nom" id="nom_id" required/>
            </p>

            <p>
                <label for="prenom_id">Prénom</label> :
                <input type="text" placeholder="John" name="prenom" id="prenom_id" required/>
            </p>

            <input type="hidden" name="controller" value="utilisateur">
            <input type="hidden" name="action" value="created">

            <p>
                <input type="submit" value="Créer l'utilisateur" />
            </p>
        </fieldset>
    </form>

    <p><a href="../web/frontController.php?controller=utilisateur&action=readAll">Retour à la liste</a></p>
</body>
</html>
