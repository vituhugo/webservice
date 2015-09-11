<?php
require 'constantes.php';
require 'vendor'.SD.'autoload.php';
require 'application'.SD.'bootstrap.php';

$config = new Respect\Config\Container('application/config/config.ini');
$mapper = new Respect\Relational\Mapper(new PDO(...$config->dsn));
$router = new Respect\Rest\Router();

//AutoLoad MVC
spl_autoload_register( function( $classname ) {
    $dirs = array(
        'Controller' => '.controller',
        'Model' => '.model',
        'Helper' => '.class'
    );
    $key = explode("\\",$classname)[1];
    require str_replace( '\\', SD, strtolower($classname) ) .$dirs[$key].'.php';
});

Application\bootstrap($mapper, $router, $config);