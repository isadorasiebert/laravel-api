<?php

define('API_BASE', 'http://localhost:8080/laravel-api/basicAPI/api/?option=');

// echo API_BASE . 'status';

echo '<p>Aplicação</p>';

$resultado = api_request('status');

echo '<pre>';
print_r($resultado);

function api_request($option) {
    $client = curl_init(API_BASE . $option);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);

    // true = array associativo
    return json_decode($response, true);
}