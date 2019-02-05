
<h1>Formulaire de contact</h1> <p><a href="../index.php">Retour au site</a></p>
<form action="#" method="post" target="_blank">
    <fieldset>
        <legend>Informations personnelles:</legend>
        <label for="lastname">Nom</label>
        <input type="text" name="lastname" required autofocus placeholder="Nom"><br>
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" required placeholder="Prénom"><br>
        <label for="gender">Gender</label>
        <input type="radio" name="gender" value="male" checked> Male
        <input type="radio" name="gender" value="female"> Female
        <input type="radio" name="gender" value="other"> Other<br>
        <label for="tel">Téléphone</label>
        <input type="tel" name="tel" size="10"><br>
        <label for="email">Email</label>
        <input type="email" name="email" required><br>
    </fieldset>
    <fieldset>
        <legend>Votre message:</legend>
        <p>A quel sujet ?</p>
        <select name="objet" size="1">
            <option value="info">Demande d'informations</option>
            <option value="newMikve">Ajouter un mikve</option>
            <option value="shop">Problème de commandes</option>
            <option value="other">Autre</option>
        </select>
        <p>Laissez-nous  un message ci dessous :</p>
        <textarea name="message" rows="3" col="20" > </textarea>
    </fieldset>
    <br>
    <input type="reset" value="Effacer">
    <input type="submit" onclick="alert('Votre message a bien été envoyé!')" value="Envoyer">

</form>