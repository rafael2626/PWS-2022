<?php
use ActiveRecord\Model;
class User extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('username', 'message' => 'It must be provided'),
        array('password'),
        array('email'),
        array('telefone'),
        array('nif'),
        array('morada'),
        array('codigopostal'),
        array('localidade'),
        array('role')
    );
    static $validates_size_of = array(
        array('morada', 'maximum' => 120),
        array('email', 'maximum' => 60),
        array('nif', 'maximum' => 1),
        array('telefone', 'is' => 9),
        array('username', 'is' => 9),
        array('password', 'maximum' => 30),
        array('codigopostal','maximum' => 30),
        array('localidade','maximum' => 80),
        array('role', 'maximum' => 15)
    );


    static $validates_format_of = array(
        array('email', 'with' => '/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/')
    );

    static $validates_inclusion_of = array(
        array('role', 'in' => array ('admin', 'funcionario', 'cliente'))
    );

    static $validates_numericality_of = array(
        array('nif', 'only_integer' => true),
        array('telefone', 'only_integer' => true)
    );
}