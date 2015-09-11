<?php
require 'constantes.php';
require 'vendor'.SD.'autoload.php';
require 'application'.SD.'bootstrap.php';

$config = new Respect\Config\Container('application/config/config.ini');
$mapper = new Respect\Relational\Mapper(new PDO(...$config->dsn));
$router = new Respect\Rest\Router();

//AutoLoad MVC
spl_autoload_register( function( $classname ) {

    $keys = explode("\\", $classname);
    if (current($keys) === "Application") {
        $map = array(
            'Application\\Controllers\\Controller' => 'application'.SD.'helper'.SD.'mvc'.SD.'controller.class.php',
            'Application\\Model\\Model' => 'application'.SD.'helper'.SD.'mvc'.SD.'model.class.php'
        );
        $classes_prefixo = array(
            'Controllers' => '.controller',
            'Model' => '.model',
            'Helper' => '.class'
        );

        if (isset($map[$classname])) {
            require $map[$classname];
        } else {
            require str_replace( '\\', SD, strtolower($classname) ) .$classes_prefixo[$keys[1]].'.php';
        }
    }
});

Application\bootstrap($mapper, $router, $config);