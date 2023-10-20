<!DOCTYPE html>
<html>
<head>
	<title>Modification d'un client</title>
</head>
<body>

<?php

	$bddPDO = new PDO('mysql:host=localhost;dbname=webtoup', 'root', '');
	$bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!isset($_POST['supprimer']))

{

$id_client = $_GET['id_client'];

$requete = "SELECT * FROM clients WHERE id_client='$id_client'";

$result = $bddPDO->query($requete);

$data=$result->fetch(PDO::FETCH_ASSOC);

?>

<form action="supp_client.php" method="post">
	<fieldset>
		<legend><b>Supprimer les coordonnées d'un client</b></legend>
		<table>
				<tr><td>Nom:</td><td><?=$data['nom']?></td></tr>

				<tr><td>Prénom:</td><td><?=$data['prenom']?></td></tr>

				<tr><td>Age:</td><td><?=$data['age']?></td></tr>

				<tr><td>Adresse:</td><td><?=$data['adresse']?></td></tr>

				<tr><td>Ville:</td><td><?=$data['ville']?></td></tr>

				<tr><td>Adresse Email:</td><td><?=$data['mail']?></td></tr>

			<tr><td><input type="reset" value="Effacer"></td>
				<td><input type="submit" name="supprimer" value="Supprimer"></td>
			</tr>

		</table>
	</fieldset>

	<input type="hidden" name="id_client" value="<?=$id_client?>">

</form>

<?php

$result->closeCursor();

}

else{

	$id_client = $_POST['id_client'];

	$requete = "DELETE FROM clients WHERE id_client = '$id_client' ";
	$result = $bddPDO->exec($requete);


	if(!$result){
		echo "Un problème est survenu , le client n'a pas été supprimé!";
	}
	else{
		echo "Le client a bien été supprimé";
		header("Location:gestion_clients.php");

	}

}

?>
</body>
</html>