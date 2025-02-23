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

// Gérer les actions d'acceptation, de refus et de suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $proposals = loadProposals();

    if (isset($_POST['accept'])) {
        $proposals[$_POST['accept']]['status'] = 'validated';
    } elseif (isset($_POST['reject'])) {
        $proposals[$_POST['reject']]['status'] = 'rejected';
    } elseif (isset($_POST['delete'])) {
        unset($proposals[$_POST['delete']]);
        $proposals = array_values($proposals); // Réindexer le tableau
    }

    saveProposals($proposals);
    header('Location: validation.php');
    exit;
}

$proposals = loadProposals();
?>
