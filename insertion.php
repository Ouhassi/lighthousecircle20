<!DOCTYPE html>
<html>
<head>
	<title>Enregistrement des données </title>
</head>
<body>
    <h1>Mohamed Ouhassi </h1>
	<a href="pagination.html"</a>
	<?php

	$bddPDO = new PDO('mysql:host=localhost;dbaname=webtoup','root',"");

	$bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if(isset($_POST['enregistrer'])){


		$Prenom = $_POST['prenom'];
		$Nom = $_POST['nom'];
		$Age = $_POST['age'];
		$Niveau = $_POST['niveau'];
		$Cours = $_POST['cours'];
		$Tel = $_POST['tel'];
		$Email = $_POST['email'];
		
		if(!empty($Prenom) && !empty($Nom) && !empty($Age)  && !empty($Niveau) && !empty($Cours) && !empty($Tel) && !empty($Email))
		{
			$requete = $bddPDO->prepare('INSERT INTO webtoup.clients(Prenom, Nom, Age, Niveau, Cours, Tel, Email) VALUES (:prenom, :nom, :age, :niveau, :cours,  
				:tel, :email)');

			$requete->bindvalue(':prenom', $Nom);
			$requete->bindvalue(':nom', $Prenom);
			$requete->bindvalue(':age', $Age);
			$requete->bindvalue(':niveau', $Niveau);
			$requete->bindvalue(':cours', $Cours);
			$requete->bindvalue(':tel', $Tel);
			$requete->bindvalue(':email', $Email);

			$result = $requete->execute();

			if(!$result){

				echo "Un problème ets survenu, l'enregistrement n'a pas été effectué!";
			}
			else{
				echo "
				<script type=\"text/javascript\"> alert('Vous êtes bien enregistré. Votre identifiant est: ".$bddPDO->lastInsertId()."')</script>";
			}

		}else
		{
			echo "Tous les champs sont recquis!";
		}

	}
	
?>

	<form action="index.html" method="post">
		<fieldset>
			<legend><b> Vos coordonnées</b></legend>
			<table>
				<tr><td>Prenom:</td><td><input type="text" name="prenom" size="50" maxlength="50"></td></tr>

				<tr><td>Nom:</td><td><input type="text" name="nom" size="50" maxlength="50"></td></tr>

				<tr><td>Age:</td><td><input type="text" name="age" size="50" maxlength="3"></td></tr>

				<tr><td>Niveau:</td><td><input type="text" name="niveau" size="50" maxlength="100"></td></tr>

				<tr><td>Cours:</td><td><input type="text" name="cours" size="50" maxlength="50"></td></tr>

				<tr><td>Tel:</td><td><input type="text" name="tel" size="50" maxlength="50"></td></tr>

				<tr><td>Email:</td><td><input type="text" name="email" size="50" maxlength="50"></td></tr>

				<tr><td><input type="reset" name="effacer" value="Effacer"></td>
					<td><input type="submit" name="enregistrer" value="Enregistrer"></td>

				</tr>



			</table>
		</fieldset>
	</form>

</body>
</html>
