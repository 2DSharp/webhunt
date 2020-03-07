<?php declare(strict_types = 1);
/*
 * This file is part of WebHunt <https://github.com/2DSharp/WebHunt>.
 *
 * (c) Dedipyaman Das <2d@twodee.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace WebHunt;
use Auryn\Injector;
use PDO;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use Predis\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Thrift\Transport\TFramedTransport;
use Twig;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use WebHunt\Component\FallbackExceptionHandler;
use WebHunt\Component\RedisSessionHandler;
use WebHunt\Component\TransportCollector;
use WebHunt\Contract\Factory\MapperFactoryInterface;
use WebHunt\Contract\Factory\QueryObjectFactoryInterface;
use WebHunt\Factory\MapperFactory;
use WebHunt\Factory\QueryObjectFactory;
use WebHunt\Model\RemoteService\Romeo\RomeoClient;
use function Skletter\Factory\addTwigGlobals;
use function WebHunt\Factory\buildLazyLoader;
use function WebHunt\Factory\buildPredis;
use function WebHunt\Factory\buildRabbitMQ;
use function WebHunt\Factory\buildRPCConnections;
use function WebHunt\Factory\getLazyLoadingPDO;
use function WebHunt\Factory\getLazyLoadingTwigFactory;
use function WebHunt\Factory\getRequestFactory;

$injector = new Injector;
/**
 * Dependencies go here
 * Add factories by delegating functions to their ctors
 */


$injector->delegate(Request::class,  function (): Request {
    $obj = Request::createFromGlobals();
    return $obj;
});
$templatesDir = __DIR__ . '/../templates/';
$templatesCacheDir = __DIR__ . '/../app/cache/templates';
function buildTwig(string $templatesDir, string $cacheDir)
{
    $loader = new FilesystemLoader($templatesDir);
    $twig = new Environment(
        $loader, [
                   //  'cache' => $cacheDir,
               ]
    );
    return $twig;
}
$injector->delegate(Twig\Environment::class, function () use ($templatesDir, $templatesCacheDir)  : Twig\Environment
{ return buildTwig($templatesDir, $templatesCacheDir); });

$injector->share(Twig\Environment::class);
$injector->alias(SessionInterface::class, Session::class);
$injector->share(SessionInterface::class);

$PDOFactory = function() {

    $dsn = 'mysql:dbname=Webhunt;host=127.0.0.1';
    $user = $_SERVER['DB_USER'];
    $password = $_SERVER['DB_PASS'];

    $obj = new PDO($dsn, $user, $password);
    $obj->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    return $obj;
};
$injector->delegate('PDO', $PDOFactory);
$injector->share('PDO');


return $injector;