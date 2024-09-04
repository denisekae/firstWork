<?php

    include_once('connexionbd.php');
    $id = @$_GET['edit'];
    if (isset($id) && $id!='') {
        $stmt2=$db->prepare("SELECT * FROM former WHERE id = '$id'");                
        $stmt2->execute();    
    }
    
    if(isset($_POST['Modifier'])){

        $id = @$_GET['edit']; 
        
        $nom = $_POST['Nom'];
        $prenom = $_POST['Prenom'];
        $telephone = $_POST['Telephone'];
        $sexe = $_POST['Sexe'];
        $pays = $_POST['Pays'];
        
        $sql2 = "UPDATE former SET Nom=nom, Prenom=prenom, Telephone=telephone, Sexe=sexe, Pays=:pays WHERE id=$id";
        $stmt3=$db->prepare($sql2);
        $stmt3 ->bindParam(':nom',$nom);
        $stmt3 ->bindParam(':prenom',$prenom);
        $stmt3 ->bindParam(':telephone',$telephone);
        $stmt3 ->bindParam(':sexe',$sexe);
        $stmt3 ->bindParam(':pays',$pays);
        /*$params = [
            ':nom'=>$nom,
            ':prenom'=>$prenom,
            ':telephone'=>$telephone,
            ':sexe'=>$sexe,
            ':pays'=>$pays,
            ':datapass'=>$datapass,
        ];*/
        $stmt3->execute();
     

        
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php foreach($stmt2 as $membres){?>
    <form action="../PHP/traitement.php" method="post" class="form-group m+2">
        <h3>Modifiez et enregistrez</h3>
        <label for="Nom">Nom:</label>
        <input class="mom" type="text" id="Nom" name="Nom" placeholder="Nom" required maxlength="20"
            value="<?php echo $membres['Nom']?>">
        <label for="Prenom:">Prenom:</label>
        <input class="mom" type="text" id="Prenom" name="Prenom" placeholder="Prenom" required maxlength="20"
            value="<?php echo $membres['Prenom']?>">
        <label for="Telephone">Telephone</label>
        <input class="mom" type="tel" id="Telephone" name="Telephone" placeholder="Phone" required maxlength="9"
            value="<?php echo $membres['Telephone']?>">
        <label for="Sexe"> Sexe
            <input type="text" class="mom" id="Sexe" name="Sexe" placeholder="Sexe"
                value="<?php echo $membres['Sexe']?>">
            </div>


            <label for="">Pays</label>
            <select name="Pays" id="Pays" required>
                <option value="Cameroun">Cameroun</option>
                <option value="Cote-ivoire">Cote-ivoire</option>
                <option value="Gabon">Gabon</option>
                <option value="Congo">Congo</option>
                <option value="Ghana">Ghana</option>
                <option value="Senegal">Senegal</option>
                <option value="Maroc">Maroc</option>
            </select>
            <a href="mercie.php?edit=<?php echo $membres['id']?>" class="btn btn-primary">Modifier</a>


    </form>
    <?php } ?>
</body>

</html>