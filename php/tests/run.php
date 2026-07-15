<?php

declare(strict_types=1);

$port = 18080;
$baseUrl = "http://127.0.0.1:$port";
$command = sprintf('php -S 127.0.0.1:%d -t public public/index.php > /tmp/izyploy-php-test.log 2>&1 & echo $!', $port);
$pid = (int) shell_exec($command);
usleep(300000);

try {
    assertJson($baseUrl . '/', ['message' => 'Hello World', 'runtime' => 'php']);
    assertJson($baseUrl . '/health', ['status' => 'ok']);
    echo "PHP route tests passed\n";
} finally {
    if ($pid > 0) {
        posix_kill($pid, SIGTERM);
    }
}

function assertJson(string $url, array $expected): void
{
    $response = file_get_contents($url);
    if ($response === false) {
        throw new RuntimeException("Request failed: $url");
    }
    $actual = json_decode($response, true, flags: JSON_THROW_ON_ERROR);
    if ($actual !== $expected) {
        throw new RuntimeException(sprintf('Expected %s, got %s', json_encode($expected), json_encode($actual)));
    }
}
