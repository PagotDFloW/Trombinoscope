<?php
//connexion
function verification($id,$mdp){
		
			$lecture=file('./data/bdd.csv');
			$found= FALSE;
			for ($i=0; $i < sizeof($lecture) ; $i++) { 
				$Rlignes= explode(";", $lecture[$i]);
				if ($id==$Rlignes[2] && md5($id.$mdp)==$Rlignes[3]) {
	        		$found=TRUE;
	    		}
	    
			}
			return $found;
		}


//inscription
function souscription(){
	if (isset($_GET['ident'])){
		if ($_GET['mdp']==$_GET['confirm']) {
			$contenu=file('./data/bdd.csv');
			$found= FALSE;
			for ($i=0; $i < sizeof($contenu) ; $i++) { 
				$Clignes= explode(";", $contenu[$i]);
				if ($_GET['ident']==$Clignes[2] && md5($_GET['ident'].$_GET['mdp'])==$Clignes[3]) {
	        		$found=TRUE;
	    		}
	    
			}
			if ($found==TRUE){
	    		echo("<p>Utilisateur déjà enregistré</p>") ;
	    
			}
			else{
        		$Fecriture= fopen("./data/bdd.csv", "a");
				fwrite($Fecriture, $_GET['nom'].";".$_GET['prenom'].";".$_GET['ident'].";".md5($_GET['ident'].$_GET['mdp']).";".$_GET['classe'].";".$_GET['groupe'].";"."\n");
				fclose($Fecriture);	

				$file=fopen('./data/logs.txt','a');
				$write_logs= date("Y-m-d H:i:s")." : ".$_GET['ident']." has been registered."."\n";
				fwrite($file, $write_logs);
				fclose($file);
	   			echo "<<p style='text-align: center;'>Nouvel utilisateur inscrit</p>";	    
	        
			}
	
	
	
	}
	else{
		echo "Mots de passe inscrit différent";
	}
}
}
		
?>