<?php
session_start();
$fichier=fopen('./data/logs.txt','a');
$write_logs= date("Y-m-d H:i:s")." : ".$_SESSION['identifiant']." has been disconneted."."\n";
fwrite($fichier, $write_logs);
fclose($fichier);
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Deconnexion</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 class="deco">Vous avez été déconnecté</h1>

	<a href="index.php" class="monBouton" id="centre">Retour à la page accueil</a>


</body>
</html>