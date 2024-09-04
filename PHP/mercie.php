<?php 

    //surprimer un utilisateur
    include_once "connexionbd.php";
        $id = @$_GET['sup'];
    if (isset($id) && $id!='') {
        $stmt2=$db->prepare("DELETE FROM former WHERE id = '$id'");                
        $stmt2->execute();    
        header("Location: mercie.php");

        /*$sth =$pdo->prepare('DELETE FROM former WHERE id=:id');
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        header("Location: mercie.php");*/
    } else {             


        $sql = "SELECT * FROM former";
        $req=$db->prepare($sql);
        $req->execute();
        $data = $req->fetchAll();
    }

?>

<?php
if (isset($_POST['recherche'])) {

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

}
echo  "<h1>Résultats de la Recherche</h1>"

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>








    <main class="table">
        <section class="table_header">
            <h1 class="element">Les inscrits</h1>
            <form action="mercie.php" method="GET" class="element">
                <input type="text" name="query" placeholder="Rechercher...">
                <button type="submit" class="btn btn-warning " name="recherche">Rechercher</button>
            </form>

        </section>
        <section class="table_body">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Sexe</th>
                        <th>Telephone</th>
                        <th>Pays</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $membres){?>
                    <tr>
                        <td class="me"><?= $membres['id']; ?></td>
                        <td class="me"><?= $membres['Nom']; ?></td>
                        <td class="me"><?= $membres['Prenom'];?></td>
                        <td class="me"><?= $membres['Sexe']; ?></td>
                        <td class="me"><?= $membres['Telephone']; ?></td>
                        <td class="me"><?= $membres['Pays']; ?></td>
                        <td>
                            <a href="mercie.php?sup=<?= $membres['id']; ?> " class="btn btn-danger">Surprimer</a>
                            <a href="update.php?edit=<?= $membres['id']; ?> " class="btn btn-primary">Modifier</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            <a href="../HTML/formulaire.html  " class="btn btn-success">Ajouter ??</a>
        </section>

    </main>

</body>

</html>