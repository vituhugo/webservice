<?php namespace Application;

use Respect\Rest\Router as RespectRouter;
use Respect\Config\Container as RespectContainer;
use Respect\Rest\Routes\Exception;
use Respect\Validation\Validator as v;
use Respect\Relational\Mapper as RespectMapper;
use Application\Model;

function bootstrap(RespectMapper $mapper, RespectRouter $router,RespectContainer $config) {
    Model\Model::setConn($mapper);

    $router->any('/**', 'Application\\Helper\\Mvc\\Router');
    /**
     * Seta o retorno de todas as rotas como resposta em JSON;
     */
    $rotas[''] = $router->always('Accept', array('application/json' => function($data) {
        header('Content-type: application/json');

        if ( v::string()->validate($data))
            $data = array($data);

        return json_encode($data,true);
    }));

    /**
     * Rota caso ocorra algum erro
     */
    $router->errorRoute(
        function($e) {
            var_dump($e);
        }
    );

    /**
     * Rota caso ocorra alguma excessão
     */
    $router->exceptionRoute(
        function($e) {
            var_dump($e);
        }
    );
    /**
     * Rotas Configuradas pelo config.ini
     */
    if (empty($config->routes)) return;
    foreach ($config->routes as $route) {
        $url = $route->url;
        $class_controller = $route->controller;
        $params = isset($route->params) ? $route->params : array();
        $router->get($url, $class_controller, $params);
    }
}