<?php
setcookie("classe",$_GET['class'],time() + 365*24*3600);
setcookie("groupe",$_GET['group'],time() + 365*24*3600);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Trombinoscope</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>	
		<h1>Trombinoscope</h1>
		<a href="index.php"><img src="./images_html/house.webp" class="logo"></a>
	</header>
	<div class="trombinoscope">
		<h2>Sélectionnez la classe</h2>
		<form action="./selection.php" method="get">
			Classe :
		<select name="class">
			<option ><?php echo $_COOKIE['classe'];?></option>
			<option value="none">--------Choix Classe--------</option>
			<option value="LpiWS">Lpi WS</option>
			<option value="LpiRS">Lpi RS</option>
			<option value="MIPI">MIPI</option>
		</select>
			Groupe :
		<select name="group">
			<option value="<?php echo $_COOKIE['groupe'];?>"><?php if ($_COOKIE['groupe']=='1') {
				echo $_COOKIE['groupe']."ère année";
			}
			else{
			 echo $_COOKIE['groupe']."ème année";
			}?></option>
			<option value="none">--------Choix Groupe--------</option>
			<option value="1">1ère année</option>
			<option value="2">2ème année</option>
			<option value="3">3ème année</option>
		</select>
		<input type="submit" name="valider" value="Valider">

		</form>
		<form id="impress">
			<input type="button" value="Imprimer ces informations" onClick="window.print()">
		</form>
		<table cellpadding="30">
			<tr>
		<?php
		if (isset($_GET['class'])&& isset($_GET['group'])) {
			if ($_GET['class']=='none'|| $_GET['group']=='none') {
				$faute="<p class='erreur'>Cette classe n'existe pas, veuillez réessayer</p>";
				echo $faute;
			}
			else{
				$jayson=file_get_contents('https://trombinoetu.yo.fr/apietu.php?classe='.$_GET['class'].'&groupe='.$_GET['group'].'&key=vHQF7qU67Bjwr5Mj');
				$tab_jayson=json_decode($jayson,True);
				echo "<h2>Eleves de la classe ".$tab_jayson['name'].":";

				for ($i=0; $i < sizeof($tab_jayson['student']); $i++) { 

					echo "<td>
							<figure>
								<img src='https://trombinoetu.yo.fr/images/".$tab_jayson['student'][$i]['Mail'].".jpg'>
								<figurecaption><br><strong id='infos'>Nom</strong> : ".$tab_jayson['student'][$i]['Nom']."
											<br><strong id='infos'>Prénom</strong> : ".$tab_jayson['student'][$i]['Prénom']."
											<br> ".$tab_jayson['student'][$i]['Mail']."
								</figurecaption>
							</figure>
						</td>";
					if ($i==5) {
						echo "</tr><tr>";
					}
					if ($i>6 && $i%6==5){
						echo "</tr><tr>";
					}
					
				
				

				}
			}
		}
		



		?>
			</tr>
		</table>
		<p>
		
		</p>
	</div>
<!-- echo "<img src='https://trombinoetu.yo.fr/images/".$tab_jayson['student'][$i]['Mail'].".jpg'">;
 -->
</body>
</html>