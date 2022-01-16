<?php

define('API_BASE', 'http://localhost:8080/laravel-api/APIoptimization/api/?option=');

// echo API_BASE . 'status';

echo '<p>Aplicação</p>';

for($i=0; $i<10; $i++) {
    $resultado = api_request('random');

    // verify if response is ok (success)
if($resultado['status'] == 'ERROR') {
    die('Aconteceu um erro na minha call (chamada à API)');
}

echo "Valor randômico: " . $resultado['data'] . "<br>";

}

ECHO 'TERMINADO';


// echo '<pre>';
// print_r($resultado);

function api_request($option) {
    $client = curl_init(API_BASE . $option);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);

    // true = array associativo
    return json_decode($response, true);
}