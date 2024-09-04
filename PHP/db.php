<?php 
     $servername = "localhost";
     $username = "root";
     $mdp = "";
     $dbname = "connexion";


     try{
         $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $mdp);
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         

     }
     catch(PDOException $e){
         echo "la connexion a echoue:" . $e->getMessage();

     }
?>