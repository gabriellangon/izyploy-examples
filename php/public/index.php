<?php

declare(strict_types=1);

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
error_log(sprintf('%s %s', $_SERVER['REQUEST_METHOD'] ?? 'GET', $path));

header('Content-Type: application/json');

if ($path === '/') {
    http_response_code(200);
    echo json_encode(['message' => 'Hello World', 'runtime' => 'php'], JSON_THROW_ON_ERROR);
    return;
}

if ($path === '/health') {
    http_response_code(200);
    echo json_encode(['status' => 'ok'], JSON_THROW_ON_ERROR);
    return;
}

http_response_code(404);
echo json_encode(['error' => 'not found'], JSON_THROW_ON_ERROR);
