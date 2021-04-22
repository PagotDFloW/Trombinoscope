<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Espace Equipe pédagogique</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<h1>Espace équipe pédagogique</h1>
	</header>

	<div class="cadre">
	<?php
		echo "<h2>Bienvenue ".$_SESSION['prenom']." sur votre espace</h2>";
	?>
	
	<p class="intro">Pour connaître les informations des étudiants de votre université, connectez-vous. <br>
		Pas encore inscrit, cliquez sur <em>Inscription</em></p>
	<a href="connexion.php" class="monBouton" id="pos">Connexion</a>
	<a href="inscription.php" class="monBouton">Inscription</a>

	</div>
</body>
</html>