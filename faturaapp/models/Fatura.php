<?php
use ActiveRecord\Model;
class Fatura extends  \ActiveRecord\Model
{
    static $belongs_to = array(
        array('fatura')
    );
}