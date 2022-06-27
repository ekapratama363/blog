<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Model_blog extends MY_Model{
    protected $_table = 'blogs';
    protected $primary_key = 'id';
    protected $return_type = 'array';
}
