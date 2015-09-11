<?php namespace Application\Controller;

use Application\Helper\Control;

class Teste extends Control\Controller {

    function index() {

    }

    function set($param1 = 'optional') {
        echo $param1;exit;
    }
}
?>