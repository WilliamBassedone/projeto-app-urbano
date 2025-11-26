<?php

require 'vendor/autoload.php';

$client = new \GuzzleHttp\Client();

// Small red dot 1x1 PNG
$base64Image1 = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8z8BQDwAEhQGAhKmMIQAAAABJRU5ErkJggg==";
// Small blue dot 1x1 PNG (slightly different base64 for testing)
$base64Image2 = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNkYPhfDwAChwGA60e6kgAAAABJRU5ErkJggg==";

try {
    $response = $client->post('http://localhost/api/v1/problems', [
        'json' => [
            'title' => 'Multiple Base64 Test',
            'description' => 'Testing multiple base64 images',
            'id_categorie' => 1,
            'geolocation' => '-23.55,-46.63',
            'photos' => [
                $base64Image1,
                $base64Image2
            ]
        ],
        'headers' => [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ]
    ]);

    echo "Status Code: " . $response->getStatusCode() . "\n";
    echo "Body: " . $response->getBody() . "\n";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    if ($e->hasResponse()) {
        echo "Response: " . $e->getResponse()->getBody() . "\n";
    }
}
