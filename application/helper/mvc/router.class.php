<?php namespace Application\Helper\Mvc;

use Respect\Rest;
use Application\Helper;

class Router implements Rest\Routable {

    private $controller_com_modulo;

    function __construct($controller_com_modulo = false) {
        $this->controller_com_modulo = $controller_com_modulo;
    }

    public function get($params) {
        $module         = $this->controller_com_modulo && isset($param[0]) ? ucfirst(array_shift($params))."\\" : '';
        $controller     = isset($param[0])      ?    ucfirst(array_shift($params))      : 'index';
        $action         = isset($param[0])      ?    array_shift($params)               : 'index';

        $obj_controller = Helper\Factory::getController($module.$controller);

        return $obj_controller->get($action, ...$params);
    }
}
?>