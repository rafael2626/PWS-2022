<?php
use ActiveRecord\Model;

class Produto extends  \ActiveRecord\Model
{
    static $belongs_to = array(
        array('produtos')
    );
}