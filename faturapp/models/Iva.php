<?php
use ActiveRecord\Model;

class Iva extends Model
{
    static $validates_presence_of = array(
        array('percentagem', 'message' => 'percentagem não pode ser vazio'),
        array('descricao', 'message' => 'descricao não pode ser vazia'),
        array('vigor','message' => 'vigor não pode ser vazio'),
    );
    static $validates_size_of = array(
        array('percentagem', 'maximum' => 20),
        array('descricao', 'maximum' => 60),
        array('vigor', 'maximum' => 9),

    );

    static $validates_numericality_of = array(
        array('percentagem', 'only_integer' => true),
    );

    static $has_many  = array(
         array('produtos'),
    );

}