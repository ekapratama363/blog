<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Model_user extends MY_Model{
    protected $_table = 'users';
    protected $primary_key = 'id';
    protected $return_type = 'array';
    protected $after_get = array('remove_sensitive_data');
    protected $before_create = array('prep_data');
    protected $before_update = array('prep_data');

    public function __construct(){
        $this->load->database();
    }

    
    protected function remove_sensitive_data($user){
        unset($user['password']);
        return $user;
    }
    
    protected function prep_data($user){
        $user['password'] = md5($user['password']);
        return $user;
    }

    public function auth_login($data){
        $query = $this->db->get_where('users', $data);

        return $query->row_object();
    }
}
