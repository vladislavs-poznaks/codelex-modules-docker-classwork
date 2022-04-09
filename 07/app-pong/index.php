<?php

use App\Http\Controllers\HomeController;
use App\Http\Request;

require_once 'vendor/autoload.php';

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', [HomeController::class, 'home']);

    $r->addRoute('GET', '/pong', [HomeController::class, 'pong']);
});

$request = new Request();

[$response, $handler, $vars] = $dispatcher->dispatch($request->method(), $request->uri());

switch ($response) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo 'NOT FOUND';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        echo 'NOT ALLOWED';
        break;
    case FastRoute\Dispatcher::FOUND:
        [$controller, $method] = $handler;

        $response = (new $controller)->{$method}($vars);

        break;
}

