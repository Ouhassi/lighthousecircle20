<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=&">
    <title>Traitement du Formulaire</title>
</head>
<body>
      <?php
     $nom=$_POST["nom"];
     $email=$_POST["email"];
     $telephone=$_POST["telephone"];
     $profession=$_POST["profession"];
    echo "Le nom de l'utilisateur est: $nom <br>";
    echo "L'email de l'utilisateur est: $email <br>";
    echo "Le numero de telephone de l'utilisateur est: $telephone <br>";
    echo "La profession de l'utilisateur est: $profession ;
    
    
    
    
    
     ?>
 </body> 
</html>
