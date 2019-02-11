<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" href="blocnote.css">
<html>
    <head>
        <title>Yet Another Notepad</title>
    </head>
    <body>
        <h1>Yet Another NotePad</h1>

<!-- Page de création de compte -->
        <div class="accountCreationPage">
<!-- Formulaire de création de compte -->
            <form action="" method="post">
                <div>
                    <label for="lastName">Nom :</label>
                    <input type="text" id="lastName" name="user_lastName" value="" placeholder="Votre Nom">
                </div>
                <div>
                    <label for="firstName">Prénom :</label>
                    <input type="text" id="firstName" name="user_firstName" value="" placeholder="Votre Prénom">
                </div>
                <div>
                    <label for="mail">e-mail :</label>
                    <input type="email" id="mail" name="user_mail" value="" placeholder="Votre e-mail">
                </div>
                <div>
                    <label for="pass">Mot de passe (8 caractères minimum):</label>
                    <input type="password" id="pass" name="password" minlength="8" maxlength="20" value="" required placeholder="Votre mot de passe">
                </div>
                <div class="button">
                    <button type="submit">Envoyer</button>
                </div>
            </form>
        </div>
    </body>
    <script src=''></script>
</html>