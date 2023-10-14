<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Recuperation des Donnees</title>
</head>
<body>


<?php

   //Connexion a la base de donnees
   //Instanciation d'un objet PDO pour creer une connexion a la base de donnees

  $bddPDO = new PDO('mysql:host=localhost;dbname=webtoup3', 'root', '');
  $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $requete = "SELECT * FROM clients ORDER BY id_client ASC";
  $result = $bddPDO -> query($requete);

  if(!$result){
  	echo "La recuperation des donnees a rencontre un probleme";

  }else{
  	$nbre_clients = $result -> rowCount();

  	?>

  	<h3>Tous nos clients</h3>
  	<h4>Il y a <?=$nbre_clients?></h4>

  	<table border=1>
  		<tr>
  			<th> Numero du client </th>
  			<th> Nom </th>
  			<th> Prenom </th>
  			<th> Age </th>
  			<th> Adresse </th>
  			<th> Ville </th>
  			<th> Adresse Email </th>
  		</tr>

  		<?php

  		while ($ligne = $result -> fetch(PDO:: FETCH_NUM)){

  			echo "<tr>";
  			foreach ($ligne as $valeur){
  				echo "<td> $valeur</td>";
  			}
  			echo "</tr>";

  		}

  		?>
  	</table>

  	<?php

  	$result -> closeCursor();
  }

 ?>

</body>

</html>