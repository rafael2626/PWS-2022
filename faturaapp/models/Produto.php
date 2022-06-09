<?php
use ActiveRecord\Model;

class Produto extends Model
{
    static $validates_presence_of = array(
        array('referencia', 'message' => 'referencia não pode ser vazio'),
        array('descricao', 'message' => 'descricao não pode ser vazia'),
        array('stock','message' => 'stock não pode ser vazio'),
        array('preco', 'message' => 'preco não pode ser vazio'),
    );
    static $validates_size_of = array(
        array('referencia', 'maximum' => 20),
        array('descricao', 'maximum' => 60),
        array('stock', 'maximum' => 9),
        array('preco', 'maximum' => 9),

    );

    static $validates_inclusion_of = array(
        array('role', 'in' => array ('admin', 'funcionario', 'cliente'))
    );

    static $validates_numericality_of = array(
        array('stock', 'only_integer' => true),
        array('referencia', 'only_integer' => true)
    );
}