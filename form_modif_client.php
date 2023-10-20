<!DOCTYPE html>
<html>
<head>
	<title>Formulaire de modification</title>
</head>
<body>

	<form action= "modif_client.php" method="post" >
	
	<fieldset> 
	<legend><b>Saisissez votre identifiant client pour modifier vos coordonnées</b></legend> <table>
	<tr>
	<td>Code client : </td>
	<td><input type="text" name="id_client" size="20" maxlength="10"/></td>
	</tr>
	<tr>
	<td>Modifier : </td>
	<td><input type="submit" value="Modifier" name="modifierClient" /></td> </tr>
	</table>
	</fieldset>

</form>

</body>
</html>