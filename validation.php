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

// Fonction de normalisation : conversion en minuscules, suppression des espaces superflus
function normalize($str) {
    // Convertir en minuscules, supprimer les espaces de début/fin et réduire les espaces multiples à un seul
    return preg_replace('/\s+/', ' ', trim(strtolower($str)));
}

// Gérer les actions d'acceptation, de refus, de suppression et de mise à jour du statut "searched"
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $proposals = loadProposals();
    
    if (isset($_POST['accept'])) {
        $proposals[$_POST['accept']]['status'] = 'validated';
    } elseif (isset($_POST['reject'])) {
        $proposals[$_POST['reject']]['status'] = 'rejected';
    } elseif (isset($_POST['delete'])) {
        unset($proposals[$_POST['delete']]);
        $proposals = array_values($proposals); // Réindexer le tableau
    } elseif (isset($_POST['term']) && isset($_POST['status'])) {
        // Normalisation du terme envoyé et de celui stocké dans chaque proposition
        $termToUpdate = normalize($_POST['term']);
        foreach ($proposals as &$proposal) {
            $proposalTerm = normalize($proposal['artiste'] . ' ' . $proposal['titre']);
            if ($proposalTerm === $termToUpdate) {
                $proposal['status'] = $_POST['status'];
                break;
            }
        }
    }
    
    saveProposals($proposals);
    header('Location: validation.php');
    exit;
}

$proposals = loadProposals();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Validation des propositions</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
                <script>
function searchYouTube(query) {
    var url = "https://www.youtube.com/results?search_query=" + query;
    window.open(url, "_blank");
}
</script>
</head>
<body>
<img src="logo.png" />
    <h1>Gérer les propositions</h1>
   <ul> <h2>Propositions en attente :</h2>
    <form action="" method="post">
        
            <?php foreach ($proposals as $index => $p) if ($p['status'] === 'pending') { ?>
                <li>
                    <?php echo htmlspecialchars("{$p['artiste']} - {$p['titre']}"); ?>
                    <button class="del2" type="submit" name="accept" value="<?php echo $index; ?>">Accepter</button>
                    <button class="del" type="submit" name="reject" value="<?php echo $index; ?>">Refuser</button>
                    <button class="del" type="submit" name="delete" value="<?php echo $index; ?>">Supprimer</button>
                    <button class="yt-search" type="button" onclick="searchYouTube('<?php echo urlencode($p['artiste'] . ' ' . $p['titre']); ?>')">🔍 YouTube</button>
                </li>
            <?php } ?>
        </ul>
    </form>
    
    <h2><a href="index.php">Retour à l'accueil</a></h2>
</body>
</html>
