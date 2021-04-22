<?php
//génération clé api
function random($longueur){
			$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 			$longueurMax = strlen($caracteres);
 			$chaineAleatoire = '';
 			for ($i = 0; $i < $longueur; $i++)
 		{
 		$chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
 		}
 		return $chaineAleatoire;
		}
		function getApi($mail){
			$recup_infos=file('./data/mail_api.csv');
			$exist_API="";
			for ($i=0; $i < sizeof($recup_infos) ; $i++) { 
				$line=explode(";", $recup_infos[$i]);
				if ($mail==$line[0]) {
					$exist_API= $line[1];
				}
			}
			return $exist_API;
		}


//génération api
function ApiEtu($filliere, $groupe){
	

	$recup_donnees=file('./data/bdd.csv');
	$infoEtu['name']=$filliere."-".$groupe;
	$infoEtu['student']=array();

	for ($i=0; $i <sizeof($recup_donnees) ; $i++) { 
		$Ligne=explode(";", $recup_donnees[$i]);
		$tableau=array();
		if ($filliere == $Ligne[4] && $groupe == $Ligne[5]) {
			$tableau[$i]['Nom']=$Ligne[0];
			$tableau[$i]['Prénom']=$Ligne[1];
			$tableau[$i]['Mail']=$Ligne[2];
			$tableau[$i]['Classe']=$Ligne[4];
			$tableau[$i]['Groupe']=$Ligne[5];
		}
		else{
			continue;
		}

		array_push($infoEtu['student'],$tableau[$i]);
	}
	return($infoEtu);

}


function Tabajason($tab){
	return json_encode($tab);
}
function KeyApi($verif){
	$recup_key=file('./data/mail_api.csv');
	$found=FALSE;
	for ($i=0; $i < sizeof($recup_key) ; $i++) { 
		$line=explode(";", $recup_key[$i]);
		if ($verif==$line[1]) {
			$found=TRUE;
			}
		}
			return $found;
}

?>