<?php

require __DIR__ . '/vendor/autoload.php';

$http = new React\Http\HttpServer(function (Psr\Http\Message\ServerRequestInterface $request) {
    return React\Http\Message\Response::plaintext(
        "Hello World!\n"
    );
});

$socket = new React\Socket\SocketServer('0.0.0.0:5000');
$http->listen($socket);

echo "Server running at http://0.0.0.0:5000" . PHP_EOL;
