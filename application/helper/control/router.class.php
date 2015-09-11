<?php namespace Application\Helper\Control;

use Respect\Rest;
use Application\Helper;

class Router implements Rest\Routable {

    private $module_exist;

    function __construct($module_exist = false) {
        $this->module_exist = $module_exist;
    }

    public function get($params) {
        $module         = $this->module_exist && isset($param[0]) ? ucfirst(array_shift($params))."\\" : '';
        $controller     = isset($param[0])      ?    ucfirst(array_shift($params))      : 'index';
        $action         = isset($param[0])      ?    array_shift($params)               : 'index';

        $obj_controller = Helper\Factory::getController($module.$controller);

        return $obj_controller->get($action, ...$params);
    }
}
?>