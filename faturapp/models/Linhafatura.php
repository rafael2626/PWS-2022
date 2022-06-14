<?php
use ActiveRecord\Model;

class Linhafatura  extends  Model

{
    static $validates_presence_of = array(
        array('quantidade', 'message' => 'percentagem não pode ser vazio'),
        array('valor', 'message' => 'descricao não pode ser vazia'),
        array('valorIva','message' => 'vigor não pode ser vazio'),
    );
}
