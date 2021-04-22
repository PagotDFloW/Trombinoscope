<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Espace Etudiant</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<h1>Espace Etudiant</h1>
		<a href="destroy.php"><img src="./images_html/destroy.png" class="logo"></a>
	</header>

	<div class="cadre">
	<?php
		echo "<h2>Bienvenue ".$_SESSION['prenom']." sur votre espace étudiant</h2>";
	?>
	
	<p class="intro">Pour connaître vos informations liées à l'université connectez-vous. <br>
		Pas encore inscrit, cliquez sur <em>Inscription</em></p>
	<p>Vous êtes un développeur? Cliquez <a href="getapi.php" class="linkpi"><strong>ici</strong></a> pour générer votre API trombinoscope.</p>
	<a href="connexion.php" class="monBouton" id="pos">Connexion</a>
	<a href="inscription.php" class="monBouton">Inscription</a>

	</div>
</body>
</html>