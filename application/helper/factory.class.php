<?php namespace Application\Helper;

class Factory {

    static public function getController($controller_class) {
        $class = "Application\\Controller\\$controller_class";
        return new $class();
    }

    static public function getModel($model_class) {
        $class = "Application\\Model\\$model_class";
        return new $class();
    }
}
?>