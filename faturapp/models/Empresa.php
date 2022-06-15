<?php
use ActiveRecord\Model;

class Empresa extends Model
{
    static $validates_presence_of = array(
        array('designacaosocial', 'message' => 'designacaosocial não pode ser vazio'),
        array('email', 'message' => 'email não pode ser vazia'),
        array('telefone','message' => 'telefone não pode ser vazio'),
        array('nif', 'message' => 'nif não pode ser vazio'),
        array('morada', 'message' => 'morada não pode ser vazio'),
        array('codigopostal', 'message' => 'codigopostal não pode ser vazia'),
        array('localidade','message' => 'localidade não pode ser vazio'),
        array('capitalsocial', 'message' => 'capitalsocial não pode ser vazio'),
    );
    static $validates_size_of = array(
        array('designacaosocial', 'maximum' => 20),
        array('descricao', 'maximum' => 60),
        array('telefone', 'maximum' => 9),
        array('nif', 'maximum' => 9),

    );

    static $validates_numericality_of = array(
        array('telefone', 'only_integer' => true),
        array('nif', 'only_integer' => true),
          array('capitalsocial', 'only_integer' => true),
    );

}