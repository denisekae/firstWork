<?php
// Connexion à la base de données
include_once 'connexionbd.php';

// Récupérer la requête de recherche
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Préparer et exécuter la requête SQL
$sql = "SELECT * FROM former WHERE Nom LIKE '%$query%'";
$stmt = $db->prepare($sql);
$stmt->execute();


// Afficher les résultats
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($results);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Résultats de la Recherche</title>
</head>

<body>
    <h1>Résultats de la Recherche</h1>
    <?php if ($results): ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Sexe</th>
            <th>Telephone</th>
            <th>Pays</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($results as $membres): ?>
        <tr>
            <td class="me"><?= $membres['id']; ?></td>
            <td class="me"><?= $membres['Nom']; ?></td>
            <td class="me"><?= $membres['Prenom'];?></td>
            <td class="me"><?= $membres['Sexe']; ?></td>
            <td class="me"><?= $membres['Telephone']; ?></td>
            <td class="me"><?= $membres['Pays']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php else: ?>
    <p>Aucun résultat trouvé pour "<?php echo htmlspecialchars($query); ?>"</p>
    <?php endif; ?>
</body>

</html>