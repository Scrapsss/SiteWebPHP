<?php

function calculerMoyenne( $nombre1, $nombre2, $nombre3 )
{
    return ( $nombre1 + $nombre2 + $nombre3 ) / 3;
    
}

function afficherResultat( $nom, $moyenne )
{
    if ($moyenne >= 10)
        echo "La moyenne de $nom est de $moyenne. Elle est suffisante";
    else
        echo "La moyenne de $nom est de $moyenne. Ce n'est pas suffisant";
}

$nom = "Alice";

$nombre1 = 6;
$nombre2 = 18;
$nombre3 = 15;

afficherResultat( $nom , calculerMoyenne( $nombre1, $nombre2, $nombre3 ) );
function carreChiffre($chiffre)
{
    return $chiffre**2;
}
?>