<?php namespace Application\Helper;

class Factory {

    static public function getController($class_controller) {
        $class = "Application\\Controllers\\$class_controller";
        return new $class();
    }

    static public function getModel($class_model) {
        $class = "Application\\Model\\$class_model";
        return new $class();
    }
}
?>