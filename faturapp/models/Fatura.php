<?php
use ActiveRecord\Model;
class Fatura extends  \ActiveRecord\Model
{
    static $belongs_to = array(
        array('fatura')
    );
    static $has_many = array(
        array('produto')
    );


    static $validates_presence_of = array(
        array('valor', 'message' => 'Valor não pode ser vazio'),
        array('total', 'message' => 'Total não pode ser vazia'),
        array('ivatotal','message' => 'IvaTotal não pode ser vazio'),
        array('data', 'message' => 'Data não pode ser vazio'),
        array('estado', 'message' => 'Etado não pode ser vazia'),
    );
    static $validates_size_of = array(
        array('valor', 'maximum' => 4),
        array('total', 'maximum' => 2),
        array('ivatotal', 'maximum' => 3),


    );

    static $validates_numericality_of = array(
        array('valor', 'only_integer' => true),
        array('total', 'only_integer' => true),
        array('ivatotal', 'only_integer' => true),
    );
}