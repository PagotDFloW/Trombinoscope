<!DOCTYPE html>
<html>
<head>
	<title>Génération API</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
</head>
<body>
	<header>
		<h1>Générez votre API</h1>
		<a href="index.php"><img src="./images_html/house.webp" class="logo"></a>
	</header>
	<div class="cadre">
		<h2>Recevez votre clé API en renseignant votre adresse mail</h2>
		<p>Cette api vous permettra d'afficher tous les élèves classé par classe et par groupe inscrits sur cette API</p>

		<form action="getapi.php" method="get">
			Renseignez votre adresse mail:<input type="email" name="ApiMail">
			<input type="submit" name="sub" value="Valider">
		</form>

		<?php 
		include './include/api.inc.php';
		$apiKey= random(16);
		$email='';
		if (isset($_GET['ApiMail'])) {
			$email=$_GET['ApiMail'];
			if (getApi($email)) {
				echo "<p>Votre clé d'API est la suivante : ".getApi($email)."</p>";
			}
			else{
				$write_line="$email;$apiKey;\n";
				$fichier=fopen('./data/mail_api.csv','a');
				fwrite($fichier, $write_line);
				echo "<p>Votre clé d'API est la suivante: ".$apiKey."</p>";


				$fichier=fopen('./data/logs.txt','a');
				$write_logs= date("Y-m-d H:i:s")." : ".$email." has been registered with a new api key."."\n";
				fwrite($fichier, $write_logs);
				fclose($fichier);
			}

		}
		

		 ?>

	</div>

</body>
</html>