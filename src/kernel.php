<?php
namespace App;
use Kint;
use App\routing\Web;
use \DI\Container;
use \DI\ContainerBuilder;

class Kernel
{

    private $container;
    private $logger;
    private static $instance = NULL;

    private function __construct(){
        session_start();
        $this->container = $this->createContainer();
        $this->logger = $this->container->get(LogManager::class);
        $this->logger->info("Arrancamos el Server");
    }

    private function __clone(){}

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new Kernel();
        }
        return self::$instance;
    }


    public function init(){
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $routeManager = $this->container->get(RouterManager::class);
        $routeManager->dispatch($httpMethod, $uri, Web::getDispatcher());
    }


    public function createContainer():Container{
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->useAutowiring(true);
        return $containerBuilder->build();
    }
}