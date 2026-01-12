<?php
use App\Covoiturage\Lib\MessageFlash;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $pagetitle ?? 'Covoiturage' ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="frontController.php?controller=voiture&action=readAll">Voitures</a>
            <a href="frontController.php?controller=utilisateur&action=readAll">Utilisateurs</a>
            <a href="frontController.php?controller=trajet&action=readAll">Trajets</a>
            <a href="frontController.php?action=formulairePreference">♥</a>
        </nav>
    </header>

    <main>
        <?php
        // Affichage des messages flash
        $tousMessages = MessageFlash::lireTousMessages();
        foreach ($tousMessages as $type => $messages) {
            foreach ($messages as $message) {
                echo "<div class=\"alert alert-$type\">$message</div>";
            }
        }
        ?>

        <?php require __DIR__ . "/$cheminVueBody"; ?>
    </main>

    
<?php require "footer.php"; ?>
</body>
</html>