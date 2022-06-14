<?php
use ActiveRecord\Model;

class Book extends Model
{
    static $validates_presence_of = array(
        array('nome','message' => 'It must be provided'),
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