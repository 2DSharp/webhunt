<?php
/*
 * This file is part of WebHunt <https://github.com/2DSharp/WebHunt>.
 *
 * (c) Dedipyaman Das <2d@twodee.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
use Auryn\Injector;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use function FastRoute\simpleDispatcher;
require_once __DIR__ . '/vendor/autoload.php';
/**
 * @var Injector $injector
 */
$injector = include_once __DIR__ . '/src/Dependencies.php';
$dotenv = Dotenv\Dotenv::create(__DIR__ . "/app/config/");
$dotenv->load();

$request = $injector->make(Request::class);

$session = $injector->make(Session::class);

$session->start();

$routes = include_once __DIR__ . '/src/Routes.php';
$request = $injector->make(Request::class);
$response = $injector->make(Response::class);

$request =$request->createFromGlobals();

$routeDefinitionCallback = function (RouteCollector $r) {
    $routes = include('src/Routes.php');
    foreach ($routes as $route) {
        $r->addRoute($route[0], $route[1], $route[2]);
    }
};

$dispatcher = simpleDispatcher($routeDefinitionCallback);

$routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getPathInfo());
switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        $response->setContent('404 - Page not found');
        $response->send();
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $response->setContent('405 - Method not allowed');
        $response->setStatusCode(405);
        break;
    case Dispatcher::FOUND:
        $className = $routeInfo[1][0];
        $method = $routeInfo[1][1];
        $vars = $routeInfo[2];

        $controllerNamespace = 'WebHunt\Controller\\';

        $controller = $controllerNamespace.$className;
        if (method_exists($controller, $method)) {
            $class = $injector->make($controller);
            $class->$method($request)->send();
        }

        break;
}
