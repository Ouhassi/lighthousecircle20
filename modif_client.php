<!DOCTYPE html>
<html>
<head>
	<title>Modification d'un client</title>
</head>
<body>

	<?php
	if(empty($_POST['id_client'])){

		header("Location:form_modif_client.php");

	}

	$bddPDO = new PDO('mysql:host=localhost;dbname=webtoup', 'root', '');
	$bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!isset($_POST['modif']))

{

$id_client = $_POST['id_client'];

$requete = "SELECT * FROM clients WHERE id_client='$id_client'";

$result = $bddPDO->query($requete);

$data=$result->fetch(PDO::FETCH_ASSOC);

?>

<form action="modif_client.php" method="post">
	<fieldset>
		<legend><b>Modifier vos coordonnées</b></legend>
		<table>
				<tr><td>Nom:</td><td><input type="text" name="nom" size="60" value="<?=$data['nom']?>"></td></tr>

				<tr><td>Prénom:</td><td><input type="text" name="prenom" size="60" value="<?=$data['prenom']?>"></td></tr>

				<tr><td>Age:</td><td><input type="text" name="age" size="60" value="<?=$data['age']?>"></td></tr>

				<tr><td>Adresse:</td><td><input type="text" name="adresse" size="60" value="<?=$data['adresse']?>"></td></tr>

				<tr><td>Ville:</td><td><input type="text" name="ville" size="60" value="<?=$data['ville']?>"></td></tr>

				<tr><td>Adresse Email:</td><td><input type="text" name="mail" size="60" value="<?=$data['mail']?>"></td></tr>

			<tr><td><input type="reset" value="Effacer"></td>
				<td><input type="submit" name="modif" value="Enregistrer"></td>
			</tr>

		</table>
	</fieldset>

	<input type="hidden" name="id_client" value="<?=$id_client?>">

</form>

<?php

$result->closeCursor();

}

elseif(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['mail'])){

	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$adresse = $_POST['adresse'];
	$ville = $_POST['ville'];
	$age = $_POST['age'];
	$mail = $_POST['mail'];

	$id_client = $_POST['id_client'];

	$requete = $bddPDO->prepare('UPDATE clients SET nom=:nom, prenom=:prenom, age=:age, adresse=:adresse, ville=:ville, mail=:mail WHERE id_client=:id_client' );

	$requete->bindvalue(':nom', $nom);
	$requete->bindvalue(':prenom', $prenom);
	$requete->bindvalue(':age', $age);
	$requete->bindvalue(':adresse', $adresse);
	$requete->bindvalue(':ville', $ville);
	$requete->bindvalue(':mail', $mail);
	$requete->bindvalue(':id_client', $id_client);

	$result = $requete->execute();

	if(!$result){
		echo "Un problème est survenu , les modifications n'ont pas été faites!";
	}
	else{
		echo "Vos modifications ont été bien effectuées";
	}

}
	else{
	echo "Modifiez vos coordonnées";
	}

?>
</body>
</html>