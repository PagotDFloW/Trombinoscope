<?php
function recup(){
            $recup_donnees=file("./data/bdd.csv");
            for ($i=0; $i < sizeof($recup_donnees); $i++) { 
                $Lpl=explode(";", $recup_donnees[$i]);
                if ($_SESSION['identifiant']== $Lpl[2]){
                    $identite=$Lpl;
                }
            }
            return $identite;
        }


function modify($newline){
    if (isset($_GET['ident'])) {
        if ($monfichier = fopen('./data/bdd.csv', 'r'))
    {
    $newcontenu = '';
    // Lecture du fichier ligne par ligne :
    while (($ligne = fgets($monfichier)) !== FALSE)
    {
        $DonLine=explode(";", $ligne);
        // Si le numéro de la ligne est égal au numéro de la ligne à modifier :
        if ($_SESSION['identifiant'] == $DonLine[2])
        {
            $newcontenu = $newcontenu . $newline;
        }
        // Sinon, on réécri la ligne
        else
        {
            $newcontenu = $newcontenu . $ligne;
        }   
    }
    fclose($monfichier);
    $fichierecriture = fopen('./data/bdd.csv', 'w');
    fputs($fichierecriture, $newcontenu);
    fclose($fichierecriture);
}
}
}
?>
