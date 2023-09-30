<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=&">
    <title>Formulaire</title>
</head>
<body>
    <form method="post" action="traitement.php">
        <fieldset>
            <legend>
                <b>Traitement du Formulaire</b>
            </legend>
                <p>
                    <label for="nom">Nom:</label>
                    <input id="nom" type="text" name="nom" placeholder="Entrez votre nom" size=40>
                </p>
                <p>
                    <label for="email">Adresse Email:</label>
                    <input id="email" type="email" name="email" placeholder="Entrez votre adresse email" size=40>
                </p>
                 <p>
                    <label for="telephone">Numero de Telephone:</label>
                    <input id="Telephone" type="telephone" name="telephone" placeholder="Entrez votre numero de telephone" size=30>
                </p>
               
                <p>
                    <label for="profession">Profession:</label>
                    <select id="profession" name="profession">
                        <option value="choisir">Choisissez votre profession </option>
                        <option value="enseignant">Enseignant</option>
                        <option value="developpeur web">Developpeur Web</option>
                        <option value="ingenieur">Ingenieur</option>
                     </select>
                </p>
                <p>
                   <input type="submit" name="envoyer" value="ENVOYER">
                   <input type="reset"  name="effqcer" value="EFFACER">
                </p>
        </fieldset>
    </form>    
</body> 
</html>
