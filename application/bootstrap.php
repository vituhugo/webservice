<?php namespace Application;

use Respect\Rest\Router as RespectRouter;
use Respect\Config\Container as RespectContainer;
use Respect\Relational\Mapper as RespectRelational;
use Respect\Validation\Validator as v;

function bootstrap(RespectRelational $mapper, RespectRouter $router,RespectContainer $config) {
    $router->any('/**', 'Application\\Helper\\Control\\Router');

    $jsonRender = function($data) {
        header('Content-type: application/json');

        if ( v::string()->validate($data))
            $data = array($data);

        return json_encode($data,true);
    };

    /*
    * Trata o retorno de todas as Rotas;
    * */
    $router->always('Accept', array('application/json' => $jsonRender));

    $router->errorRoute(
        function($e) {

        }
    );
    $router->exceptionRoute(
        function($e) {

        }
    );
}