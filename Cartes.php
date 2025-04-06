<?php
$carte = $_GET['carte'] ?? 'lucario';
$url = "https://api.pokemontcg.io/v2/cards?q=name:$carte";

$response = file_get_contents($url);
if ($response == FALSE)
{
    http_response_code(500);
    echo json_encode(['error' => 'Erreur lors de la récupération des données.']);
    exit;
}

header('Content-Type: application/json');
echo $response;