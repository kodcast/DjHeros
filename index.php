<?php
// Charger les propositions depuis un fichier JSON
function loadProposals() {
    $file = 'propositions.json';
    if (!file_exists($file)) {
        file_put_contents($file, json_encode([]));
    }
    return json_decode(file_get_contents($file), true);
}

// Sauvegarder les propositions dans le fichier JSON
function saveProposals($proposals) {
    file_put_contents('propositions.json', json_encode($proposals, JSON_PRETTY_PRINT));
}
// Fonction pour vérifier les doublons
function isDuplicate($proposals, $artiste, $titre) {
    foreach ($proposals as $proposal) {
        if (
            strtolower(trim($proposal['artiste'])) === strtolower(trim($artiste)) &&
            strtolower(trim($proposal['titre'])) === strtolower(trim($titre))
        ) {
            return true;
        }
    }
    return false;
}
$error = ""; 
// Ajouter une nouvelle proposition
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['artiste'], $_POST['titre'])) {
    $proposals = loadProposals();
    $artiste = $_POST['artiste'];
    $titre = $_POST['titre'];

    // Vérifier les doublons avant d'ajouter
    if (!isDuplicate($proposals, $artiste, $titre)) {
        $proposals[] = [
            'artiste' => $artiste,
            'titre' => $titre,
            'status' => 'pending'
        ];
        saveProposals($proposals);
        header('Location: index.php');
        exit;
    } else {
        $error = "Cette proposition existe déjà !";
    }
}

$proposals = loadProposals();
?>

<!DOCTYPE html>
<html>
<head>
    <title>DJ Heros</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<img src="logo.png" />
    <h1>Proposez votre musique</h1>
    <form action="" method="post">
        <input type="text" name="artiste" placeholder="Artiste" required><br>
        <input type="text" name="titre" placeholder="Titre" required><br>
        <input type="submit" value="Proposer">
                        <!-- Affichage du message d'erreur sous le formulaire -->
        <?php if (!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
    </form>
    <ul>
    <h2>Propositions en attente ⏱️ :</h2>
    <form action="" method="post">
        

                               <?php
// Trier les propositions en attente par ordre inverse (les plus récentes en premier)
    $validatedProposals = array_filter($proposals, function($p) {
    return $p['status'] === 'pending';
});
    $validatedProposals = array_reverse($validatedProposals); // Inverser l'ordre

    foreach ($validatedProposals as $p) {
    echo "<li>{$p['artiste']} - {$p['titre']}</li>";
}
?>
    </ul>
    <ul>
    <h2>Propositions Validées ✅​ :</h2>
    
                <?php
// Trier les propositions validées par ordre inverse (les plus récentes en premier)
    $validatedProposals = array_filter($proposals, function($p) {
    return $p['status'] === 'validated';
});
    $validatedProposals = array_reverse($validatedProposals); // Inverser l'ordre

    foreach ($validatedProposals as $p) {
    echo "<li>{$p['artiste']} - {$p['titre']}</li>";
}
?>
    </ul>

    <ul>
        <h2>Propositions ajoutées à la playlist 👍​ :</h2>
                    <?php
// Trier les propositions validées par ordre inverse (les plus récentes en premier)
    $validatedProposals = array_filter($proposals, function($p) {
    return $p['status'] === 'searched';
});
    $validatedProposals = array_reverse($validatedProposals); // Inverser l'ordre

    foreach ($validatedProposals as $p) {
    echo "<li>{$p['artiste']} - {$p['titre']}</li>";
}
?>
    
    </ul>
    <ul>
    <h2>Propositions Refusées ❌​ :</h2>
    
                        <?php
// Trier les propositions refusées par ordre inverse (les plus récentes en premier)
    $validatedProposals = array_filter($proposals, function($p) {
    return $p['status'] === 'rejected';
});
    $validatedProposals = array_reverse($validatedProposals); // Inverser l'ordre

    foreach ($validatedProposals as $p) {
    echo "<li>{$p['artiste']} - {$p['titre']}</li>";
}
?>
    </ul>

    <div class="footer">2025 🄯 by K0d</div>  
</body>
</html>

