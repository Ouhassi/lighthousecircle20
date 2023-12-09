<!DOCTYPE html>
<html>
<head>
	<title>Récupération des données</title>
</head>
<body>
<?php
	//Connexion à la base de données

//instanciation d'un objet PDO pour creer une connexion à la base de donnée
$bddPDO = new PDO('mysql:host=localhost;dbname=webtoup', 'root', '');
$bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$requete = "SELECT * FROM clients ORDER BY id_client ASC";
$result = $bddPDO->query($requete);

if (!$result){
	echo "La récupération des données a rencontré un probléme!";

}else{
	$nbre_clients = $result->rowCount();

?>
<h3>Tous nos clients</h3>
<h4>Il y a <?=$nbre_clients?> clients</h4>
<table border="1">
	
<tr>
	<th>Numéro de client</th>
	<th>Prenom</th>
	<th>Nom</th>
	<th>Age</th>
	<th>Niveau</th>
	<th>Cours</th>
	<th>Tel</th>
	<th>Email</th>

</tr>

<?php

while($ligne= $result->fetch(PDO::FETCH_NUM)){
	echo "<tr>";
	foreach ($ligne as $valeur) {
		echo "<td>$valeur</td>";
	}

	echo "</tr>";
}

?>

</table>
<?php
$result->closeCursor();


}
?>

</body>
</html>