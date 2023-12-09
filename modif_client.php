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
				<tr><td>Prenom:</td><td><input type="text" name="prenom" size="60" value="<?=$data['prenom']?>"></td></tr>

				<tr><td>Nom:</td><td><input type="text" name="nom" size="60" value="<?=$data['nom']?>"></td></tr>

				<tr><td>Age:</td><td><input type="text" name="age" size="60" value="<?=$data['age']?>"></td></tr>

				<tr><td>Niveau:</td><td><input type="text" name="niveau" size="60" value="<?=$data['niveau']?>"></td></tr>

				<tr><td>Cours:</td><td><input type="text" name="cours" size="60" value="<?=$data['cours']?>"></td></tr>

				<tr><td>Tel:</td><td><input type="text" name="tel" size="60" value="<?=$data['tel']?>"></td></tr>

				<tr><td>Email:</td><td><input type="text" name="email" size="60" value="<?=$data['email']?>"></td></tr>

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

elseif(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['age']) && isset($_POST['niveau']) && isset($_POST['cours']) && isset($_POST['tel'])      && isset($_POST['email'])){

	$Prenom = $_POST['prenom'];
	$Nom = $_POST['nom'];
	$Age = $_POST['age'];
	$Niveau = $_POST['niveau'];
	$Cours = $_POST['cours'];
	$Tel = $_POST['tel'];
	$Email = $_POST['email'];

	$id_client = $_POST['id_client'];

	$requete = $bddPDO->prepare('UPDATE clients SET Prenom=:prenom, Nom=:nom, Age=:age, Niveau=:niveau, Cours=:cours, Tel=:tel, Email=:email WHERE id_client=:id_client' );

	$requete->bindvalue(':prenom', $Prenom);
	$requete->bindvalue(':nom', $Nom);
	$requete->bindvalue(':age', $Age);
	$requete->bindvalue(':niveau', $Niveau);
	$requete->bindvalue(':cours', $Cours);
	$requete->bindvalue(':tel', $Tel);
	$requete->bindvalue(':email', $Email);
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