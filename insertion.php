<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Enregistrement des Donnees</title>
</head>
<body>

 <form  action = "insertion.php"   method = "post">
 	<fieldset>
 		<legend><b>Vos Coordonnees</b></legend>
 		<table>
 			<tr><td>Nom</td><td><input type= "text" name= "nom" size= "50" maxlength="50"></td></tr>

 			<tr><td>Prenom</td><td><input type= "text" name= "prenom" size= "50" maxlength="50"></td></tr>

 			<tr><td>Age</td><td><input type= "text" name= "age" size= "50" maxlength="3"></td></tr>

 			<tr><td>Adresse</td><td><input type= "text" name= "adresse" size= "50" maxlength="100"></td></tr>

 			<tr><td>Ville</td><td><input type= "text" name= "ville" size= "50" maxlength="50"></td></tr>

 			<tr><td>Adresse Eail</td><td><input type= "text" name= "mail" size= "50" maxlength="50"></td></tr>

 			<tr><td><input type="reset" name="effacer" value="Effacer"></td>
 				<td><input type="submit" name="enregistrer" value="Enregistrer"></td>

 			</tr>
 		</table>
 	</fieldset>
 	
 </form>


</body>
</html>