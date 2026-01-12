

<form method="get" action="frontController.php">
    <input type="hidden" name="action" value="enregistrerPreference">

    <?php $defaut = $controleur_defaut; ?>

    <label>
        <input type="radio" name="controleur_defaut" value="voiture"
            <?= $defaut === "voiture" ? "checked" : "" ?>>
        Voiture
    </label>

    <label>
        <input type="radio" name="controleur_defaut" value="utilisateur"
            <?= $defaut === "utilisateur" ? "checked" : "" ?>>
        Utilisateur
    </label>

    <label>
        <input type="radio" name="controleur_defaut" value="trajet"
            <?= $defaut === "trajet" ? "checked" : "" ?>>
        Trajet
    </label>

    <button type="submit">Enregistrer</button>
</form>
