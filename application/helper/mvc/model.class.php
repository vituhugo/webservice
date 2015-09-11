<?php namespace Application\Model;

use Respect\Relational\Mapper as RespectRelational;

abstract class Model {

    static private $mapper;
    protected $db;

    static public function setConn(RespectRelational $mapper) {
        self::$mapper = $mapper;
    }

    function __construct() {
        $this->db = self::$mapper;
    }
}