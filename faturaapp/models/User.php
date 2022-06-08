<?php
use ActiveRecord\Model;
class User extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('username', 'message' => 'Username não pode ser vazio'),
        array('password', 'message' => 'Password não pode ser vazia'),
        array('email','message' => 'Email não pode ser vazio'),
        array('telefone', 'message' => 'Telefone não pode ser vazio'),
        array('nif', 'message' => 'Nif não pode ser vazia'),
        array('morada', 'message' => 'Morada não pode ser vazio'),
        array('codigopostal', 'message' => 'Codigopostal não pode ser vazio'),
        array('localidade', 'message' => 'Localidade não pode ser vazia'),

    );
     static $validates_size_of = array(
       array('morada', 'maximum' => 120),
        array('email', 'maximum' => 60),
        array('nif', 'maximum' => 9),
        array('telefone', 'maximum' => 9),
         array('username', 'maximum' => 9),
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