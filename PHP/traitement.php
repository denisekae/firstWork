<?php
//rapport d'erreur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        
        //connexion
       $servername = "localhost";
        $username = "root";
        $mdp = "";
        $dbname = "connexion";


        try{
            $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $mdp);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "la connexion a ete bien etablie";

        }
        catch(PDOException $e){
            echo "la connexion a echoue:" . $e->getMessage();

        }
 

        if(isset($_POST['Envoyer'])){
            require_once'db.php';

            $nom = $_POST['Nom'];
            $prenom = $_POST['Prenom'];
            $telephone = $_POST['Telephone'];
            $sexe = $_POST['Sexe'];
            $pays = $_POST['Pays'];
            $datapass = $_POST['Datapass'];
            //echo "hello";
            
            try{
                $sql = "INSERT INTO former (Nom, Prenom, Telephone, Sexe, Pays, Datapass) VALUES (:nom, :prenom, :telephone, :sexe, :pays, :datapass)";
                $requette = $conn->prepare($sql);
                echo "hey";

                $params = [
                    ':nom'=>$nom,
                    ':prenom'=>$prenom,
                    ':telephone'=>$telephone,
                    ':sexe'=>$sexe,
                    ':pays'=>$pays,
                    ':datapass'=>$datapass,
                ];

              

                $requette->execute($params);
                header("Location: mercie.php");
                echo "Enregistrement reussi";

            }catch(PDOException $e){
                echo "Erreur lors de l'enregistrement :".$e->getMessage();
            }
            
        } else {
            echo "Tu mens";
        }

    ?>
</body>

</html>