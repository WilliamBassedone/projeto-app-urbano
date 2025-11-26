<?php
// public/debug_upload.php

header('Content-Type: application/json');

$response = [
    'status' => 'received',
    'method' => $_SERVER['REQUEST_METHOD'],
    'content_type' => $_SERVER['CONTENT_TYPE'] ?? 'not set',
    'post_data' => $_POST,
    'files_data' => $_FILES,
    'php_upload_max_filesize' => ini_get('upload_max_filesize'),
    'php_post_max_size' => ini_get('post_max_size'),
];

echo json_encode($response);
