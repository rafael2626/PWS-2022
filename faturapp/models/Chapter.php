<?php
use ActiveRecord\Model;

class Chapter extends Model
{
    static $belongs_to = array(
      array('book')
    );
    /**
     * @var mixed|null
     */


}