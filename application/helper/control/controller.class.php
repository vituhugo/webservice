<?php namespace Application\Helper\Control;

abstract class Controller {

    function get($action, $params = array()) {
        if ($action === null) $action = 'index';
        return $this->$action(...$params);
    }
}