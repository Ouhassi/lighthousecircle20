<!DOCTYPE html>
<html>
<head>
	<title>Modification d'un client</title>
</head>
<body>

<?php
	if(empty($_POST['id_client'])){

		header("Location:form_supp_client.php");

	}

	$bddPDO = new PDO('mysql:host=localhost;dbname=webtoup', 'root', '');
$bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!isset($_POST['supprimer']))

{

$id_client = $_POST['id_client'];

$requete = "SELECT * FROM clients WHERE id_client='$id_client'";

$result = $bddPDO->query($requete);

$data=$result->fetch(PDO::FETCH_ASSOC);

?>

<form action="supprimer_client.php" method="post">
	<fieldset>
		<legend><b>Supprimer les coordonnées d'un client</b></legend>
		<table>
				<tr><td>Prenom:</td><td><?=$data['prenom']?></td></tr>

				<tr><td>Nom:</td><td><?=$data['nom']?></td></tr>

				<tr><td>Age:</td><td><?=$data['age']?></td></tr>

				<tr><td>Niveau:</td><td><?=$data['niveau']?></td></tr>

				<tr><td>Cours:</td><td><?=$data['cours']?></td></tr>

				<tr><td>Tel:</td><td><?=$data['tel']?></td></tr>

				<tr><td>Email:</td><td><?=$data['email']?></td></tr>

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
	}

}

?>
</body>
</html>