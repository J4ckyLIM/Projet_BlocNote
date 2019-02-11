<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" href="blocnote.css">
<html>
    <head>
        <title>Yet Another Notepad</title>
    </head>
    <body>
        <h1>Yet Another NotePad</h1>
 <!-- Page d'accueil à l'entrée du site -->
        <div class="homePage">
            <section class="head">
                <h2>Présentation:</h2>
                <p>Yet Another Notepad, une application permettant de créer, consulter, gérer ses notes.</p>
            </section>
            <section class="access">
                <a href="" class="btn">Connexion</a>
                <a href="signup.php" class="btn">Inscription</a>
            <section>
        </div>

<!-- formulaire de connexion quand on appuis sur le bouton connexion -->
        <div class="login-content">
            <div class="login-header">
                <button type="button" class="close" data-dismiss="login">×</button>
                <h4 class="login-title">Connexion</h2>
            </div>
            <form class="form" id="l_form" method="post" action="">
				<div class="login-body">
					<span class="input-container">
						<input type="email" id="l_m" name="email" autocomplete="new-password" placeholder="Adresse email">
						<span class="subline"></span>
					</span>
									
					<span class="input-container">
						<input type="password" id="l_p" name="password" autocomplete="new-password" placeholder="Mot de passe">
						<span class="subline"></span>
					</span>
                </div>

                <div>
					<input id="l_r" type="checkbox"><label for="s_gcu">Se souvenir de moi ?</label>
                </div>
					<span id="p-lost">Mot de passe oublié ?</span>
				<div class="login-footer">
					<button type="submit" class="btn btn-success btn-outline"><span class="glyphicon glyphicon-ok"></span>Valider</button>
					<button type="button" class="btn btn-danger btn-outline" data-dismiss="login"><span class="glyphicon glyphicon-remove"></span>Fermer</button>
				</div>
			</form>
        </div>

<!-- Page principale d'accès aux note -->
        <div class="mainPage">
        </div>
    </body>
    <script src=''></script>
</html>