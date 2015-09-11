<?php namespace Application\Controllers;

class Teste extends Controller {

    function index() {

    }

    function set($param1 = 'optional') {
        echo $param1;exit;
    }
}
?>