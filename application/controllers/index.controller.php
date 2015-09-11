<?php namespace Application\Controllers;

use Application\Helper;

class Index extends Controller {

    function index() {
        $user = Helper\Factory::getModel('user');
        return $user->get();
    }
}