<?php namespace Application\Model;

class User extends Model {

    function get() {
        return (array)$this->db->usuario->fetchAll();
    }
}