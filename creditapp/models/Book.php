<?php

class Book extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('nome'),
        array('isbn', 'message' => 'It must be provided')
    );

    static $validates_size_of = array(
        array('isbn', 'within' => array(10, 13))
    );

    static $belongs_to = array(
        array('genre')
    );

    static $has_many = array(
        array('chapters')
    );
}